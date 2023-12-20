<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {

        return 'Olá Laravel';
    }

    public function store(Request $request)
    {
//pega o body
        var_dump($request->all());
    }
}
