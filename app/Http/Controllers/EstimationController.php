<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estimations;

class EstimationController extends Controller
{
     public function index()
     {
        $estimations = estimations::all();

        return response()->json($estimations,200);
     }
     public function store(Request $request)
     {
         $ValidatedData  = $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'project_id' => 'required|exists:projects,id',
             'type' => 'required|in:hourly,fixed',
             'amount' => 'required|numeric',
             'date' => 'required|date',
         ]);
 
         $estimation = Estimation::create($ValidatedData);
 
         return response()->json($estimation,201);
     }

     public function update(Request $request, $id)
     {
      $estimation = estimations::find($id);

      if (is_null($client)) {
         return response()->json(['message' => 'Client not found'], 404);
     }
     $validatedData = $request->validate([
      'name' => 'required|string|max:255',
       'description' => 'required|string',
       'project_id'=> 'required|exists:project_id',
       'client_id'=>'required|exists:clients,id',
       'date'=>'required|date',
       'type' => 'required|in:hourly,fixed',
       'amount' => 'required|numeric',
     ]);
     $estimation ->update($validatedData);
     return response()->json($estimation,200);
     }
     public function destroy($id)
     {
      $estimation = estimations::find($id);

      if (is_null($client)) {
         return response()->json(['message' => 'Client not found'], 404);
     }
     $estimation->delete();
     return response()->json(['message'=>'estimations delete',204]);
     }
     public function show($id)
     {
        return estimations::find($id);
     }

}
