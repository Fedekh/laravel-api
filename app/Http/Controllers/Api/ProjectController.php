<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('technology_id')){
            $projects = Project::with(['type', 'technologies'])->has('technologies', function($query) use ($request){
                $query->where('id', $request->technology_id);
            })->paginate(8);
        }
        
        if($request->has('type_id')){
            // con with si caricano le relazioni, si usano come argomenti i nomi delle relazioni che si trovano nei model
            //se nel request c'è l'elemento type_id prendo in base alla tipologia
            $projects = Project::with(['type', 'technologies'])->where('type_id', $request->type_id)->and()->paginate(8);
        }else{
            //altrimenti prendo tutti i projects
            $projects = Project::with(['type', 'technologies'])->paginate(8);
        }
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);

        //scritto cosi il return significa che è un json contenente un array associativo con chiave results e valore $projects, la chiave success è un booleano che indica se la richiesta è andata a buon fine o no è facoltiva
    }
    public function show($slug)
    {
        $project = Project::with(['type', 'technologies'])->where('slug', $slug)->first();
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Nessun progetto trovato'
            ])->setStatusCode(404);
        }
    }
}
