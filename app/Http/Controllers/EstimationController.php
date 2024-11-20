<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimation;

class EstimationController extends Controller
{
     public function index()
     {
        $Estimation = Estimation::all();

        return response()->json($Estimation,200);
     }
     public function store(Request $request)
     {
         $ValidateData  = $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'required|string',
             'project_id' => 'required|exists:projects,id',
             'type' => 'required|in:hourly,fixed',
             'amount' => 'required|numeric',
             'date' => 'required|date',
         ]);
 
         $estimation = Estimation::create($ValidateData);
        // $Project=projects::create($ValidateData);
 
         return response()->json($estimation,201);
     }

     public function update(Request $request, $id)
     {
      $estimation = Estimation::find($id);

      if (is_null($estimation)) {
         return response()->json(['message' => 'Client not found'], 404);
     }
     $validatedData = $request->validate([
      'name' => 'required|string|max:255',
       'description' => 'required|string',
       'project_id' => 'required|exists:projects,id',
       'client_id'=>'required|exists:clients,id',
       'date'=>'required|date',
       'type' => 'required|in:hourly,fixed',
       'amount' => 'required|numeric',
     ]);
     $estimation ->update($validatedData);
     return response()->json($estimation,200);
     }
     public function delete($id)
     {
      $estimation = Estimation::find($id);

      if (is_null($estimation)) {
         return response()->json(['message' => 'Client not found'], 404);
     }
     $estimation->delete();
     return response()->json(['message'=>'Estimation delete',204]);
     }
     public function show($id)
     {
        return Estimation::find($id);
     }

}
