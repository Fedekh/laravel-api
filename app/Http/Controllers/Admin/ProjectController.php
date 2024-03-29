<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectReqeust;
use App\Mail\NewProject;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $projects = Project::paginate(10);
        $data = $request->all();
        $count = Project::count();
        $butt = true;
        $types = Type::all();
        $technologies = Technology::all();
        
        // Se nel request abbiamo type_id filtriamo per tipologia
        // Altrimenti facciamo vedere tutti i projects    
        if ($request->has('type_id') && !is_null($data['type_id'])) {
            $projects = Project::where('type_id', $data['type_id'])->paginate(10);
        } else {
            $projects = Project::paginate(10);
        }
        return view('admin.projects.index', compact('projects', 'count', 'butt', 'technologies', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //creazione project
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        $data['user_id'] = Auth::user()->id;
        // dd($data);
        
        // Salvataggio del file
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('project_images', $request->image);
            $data['image'] = $path;
        }

        //salvataggio project in DB
        $project = Project::create($data);

        //email all amminastratore con avviso del nuovo project
        Mail::to('federicocet@gmail.com')->send(new NewProject($project));
        
        
        //salvataggio dati tabella ponte
        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies); // aattach significa che se ci sono tecnologie le salva nella tabella ponte e tecnologies è preso come metodo perchè è una relazione many to many
        }
        return redirect()->route('admin.projects.index')->with('message', 'Il progetto ' . $project->title . ' è stato creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectReqeust $request, Project $project)
    {
        //aggiornamento dati project
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }
            $path = Storage::disk('public')->put('project_images', $request->image);
            $data['image'] = $path;
        }
        
        $project->update($data);
        //aggiornamento technologies
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies); //sync significa che se ci sono tecnologie le salva nella tabella ponte 
        } else {
            $project->technologies()->detach(); //detach significa che se non ci sono tecnologie le cancella dalla tabella ponte 
        }

        return redirect()->route('admin.projects.index', $project->slug)->with('message', 'Il progetto ' . $project->title . ' è stato modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->technologies()->detach();
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Il progetto ' . $project->title . ' è stato eliminato con successo');
    }
}
