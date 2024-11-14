<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clients;

class ClientController extends Controller
{
    public function index()
    {
        $clients = clients::all();

        return  response()->json($clients,200);
    }

    public function store(Request $request)
    { 
 

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'logo' => 'string', 
            'country' => 'required|string',
            'email' => 'required|email',
        ]);

        $client = clients::create($validatedData);
    
        return response()->json($client, 201);
    }

    public function update(Request $request, $id)
    {
        $client = clients::find($id);

        if (is_null($client)) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'logo' => 'nullable|string',
            'country' => 'required|string|max:255',
            'email' => 'required|string|email|unique:clients,email,' . $id,    
        ]);

        $client->update($validatedData);

        return response()->json($client, 200);
    }
    public function delete($id)
    {
        $client = clients::find($id);
    
        if (is_null($client)) {
            return response()->json(['message' => 'Client not found'], 404);
        }
    
        $client->delete();
    
        return response()->json(['message' => 'Client deleted'], 204);
    }
    public function show($id)
    {
       return clients::find($id);
    }

}
