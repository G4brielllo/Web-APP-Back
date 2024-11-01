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

    public function show($id)
    {
      
       return Client::find($id);
    }

}
