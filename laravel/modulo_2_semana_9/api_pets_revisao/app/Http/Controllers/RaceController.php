<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    //Lista todos ou parcialmente os dados de um recurso
    public function index()
    {

            $races = Race::all();
            return $races;

    }

    
}
