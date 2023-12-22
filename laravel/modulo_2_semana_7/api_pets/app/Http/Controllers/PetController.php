<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        try {
            $pets = Pet::all();
            return $pets;
        } catch (\Throwable $e) {

            return;
        }
    }


    //pega o body usado para cadastro
    public function store(Request $request)
    {

        $data = $request->all();

        //Pegar somente um campo
        /*  $name = $request->input('name'); */

        $pet = Pet::create($data);

        return $pet;
    }

    //funcao usada pra deletar atraves do id
    public function destroy($id)
    {
        $pet =  Pet::find($id);

        if (!$pet)return $this->response('Pet nao encontrado', null, false, 404);

        $pet->delete();

        return $this->response(' ', null, true, 204);
    }


    //buscar os dados de um pet atraves de um id
    public function show($id){

        $pet = Pet::find($id);

        if (!$pet)return $this->response('Pet nao encontrado', null, false, 404);

        return $this->response(' ', $pet, true, 200);

    }


    //
    public function update($id, Request $request){

        

        $data = $request->all();

        $pet =  Pet::find($id);

        if (!$pet)return $this->response('Pet nao encontrado', null, false, 404);

        $pet->update($data);

        return $pet;
    }
}
