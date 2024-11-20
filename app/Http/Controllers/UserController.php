<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class UserController extends Controller
{
    public function index()
    {
        $Client = Client::all();

        return  response()->json($Client,200);
    }

    public function show($id)
    {
      
       return Client::find($id);
    }

}
