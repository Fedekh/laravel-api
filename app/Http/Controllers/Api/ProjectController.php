<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
        {
            // $projects = Project::all();  
            // $projects = Project::paginate(8);   

            // con with si caricano le relazioni, si usano come argomenti i nomi delle relazioni che si trovano nei model
            $projects = Project::with(['type', 'technologies' ])->paginate(10); 
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
            
            //scritto cosi il return significa che è un json contenente un array associativo con chiave results e valore $projects, la chiave success è un booleano che indica se la richiesta è andata a buon fine o no è facoltiva
        }
}
