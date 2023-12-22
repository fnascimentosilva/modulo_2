<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Exception;
use Illuminate\Http\Request;

class RaceController extends Controller
{


    public function index()
    {
        try {
            $races = Race::all();
            return $races;
        } catch (\Throwable $e) {

            return;
        }
    }

    public function store(Request $request)
    {

try {
    $request->validate([
        'name' => 'required|string|unique:races|max:50'

    ]);

    $data = $request->all();

    //Pegar somente um campo
    /*  $name = $request->input('name'); */

    $race = Race::create($data);

    return $race;
} catch (Exception $exception) {
return $this->response($exception->getMessage(), null, false, 400);
}

    }
}
