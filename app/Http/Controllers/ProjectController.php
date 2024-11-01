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
    public function show($id)
    {
      
       return projects::find($id);
    }
}
