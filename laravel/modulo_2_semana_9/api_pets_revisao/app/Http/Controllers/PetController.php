<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PetController extends Controller
{
    public function index(Request $request)
    { //faz um filtro pra pegar somente uma informaçao
        try {
            $filters = $request->query();

            $pets = Pet::query();
            //verifica se a age do pet nao esta vazia
            if ($request->has('age') && !empty($filters['age'])) {
                $pets->where('age', $filters['age']);
            }
            //verifica se o nome do pet nao esta vazio
            if ($request->has('name') && !empty($filters['name'])) {
                //dessa forma ele busca quando a pesquisa tem letra maiuscula ou minuscula
                $pets->where('name', 'ilike', '%' . $filters['name'] . '%');
            }

            if ($request->has('size') && !empty($filters['size'])) {
                $pets->where('size', $filters['size']);
            }

            return $pets->orderBy('name')->get();
        } catch (Exception $exception) {

            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);;
        }
    }

    //pega o body usado para cadastro
    public function store(Request $request)
    {
        try {
            // rebecer os dados via body
            $data = $request->all();

            $request->validate([
                'name' => 'required|string|max:150',
                'age' => 'int',
                'weight' => 'numeric',
                'size' => 'required|string|in:SMALL,MEDIUM,LARGE,EXTRA_LARGE', // melhorar validacao para enum
                'race_id' => 'required|int',
                'specie_id' => 'required|int',
                'client_id' => 'int'
            ]);

            $pet = Pet::create($data);

            /* if (!empty($pet->client_id)) {

                $people = People::find($pet->client_id);

                Mail::to($people->email, $people->name)
                    ->send(new SendWelcomePet($pet->name, 'Henrique Douglas'));
            } */

            return $pet;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
