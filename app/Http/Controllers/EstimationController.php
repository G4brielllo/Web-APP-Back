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
     public function show($id)
     {
        return estimations::find($id);
     }

}
