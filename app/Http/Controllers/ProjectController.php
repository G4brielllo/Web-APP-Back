<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = projects::all();

        return  response()->json($projects,200);
    }
    public function store(Request $request)
    {
        $ValidateData=$request->validate([
            'client_id' => 'required|exists:clients,id',
            'name' => 'required|string',
            'description'=>'nullable|string'
        ]);

        $Project=Project::create($ValidateData);

        return response()->json($Project,201);
    }
    public function update(Request $request, $id)
    {
    $project = projects::find($id);
    if (is_null($client)) {
        return response()->json(['message' => 'Client not found'], 404);
    }

      $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'client_id' => 'required|exists:clients,id',
        ]);

    $project->update($validatedData);
    return response()->json($project,200);

    }
    public function destroy($id)
    {
        $project = projects::find($id);

        if (is_null($client)) {
            return response()->json(['message' => 'Client not found'], 404);
        }
        $project->delete();
        return response()->json(['message'=>'project delete',204]);
    }
    public function show($id)
    {
       return projects::find($id);
    }
}
