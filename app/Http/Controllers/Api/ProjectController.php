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
        $projects = Project::with(['type', 'technologies']);

        if ($request->has('technologies')) {
            $projects = $projects->has('technologies', function ($query) use ($request) {
                $query->where('technology_id', $request->technology_id);
            });
        }


        if ($request->has('type_id')) {
            $projects = $projects->where('type_id', $request->type_id);
        };


        $projects = $projects->paginate(8);

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
