<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NewLead;
use App\Models\Lead;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        //validazione interna senza request per essere veloci
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'name' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            //inviare risposta con errore
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $new_lead = Lead::create($data);

        //per inviare email
        Mail::to('federicocet@gmail.com')->send(new NewLead($new_lead));

        return response()->json([
            'success' => true,
        ]);
    }
}
