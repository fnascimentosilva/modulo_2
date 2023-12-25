<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomePet;
use App\Models\Pet;
use App\Traits\HttpResponses;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class PetController extends Controller
{
    use HttpResponses;

    public function index(Request $request)
    { //faz um filtro pra pegar somente uma informaçao
        try {
            $filters = $request->query();

            $pets = Pet::query()


            #->with('race') // traz todas as colunas
            ->with(['race' => function ($query) {
                $query->select('name', 'id');
            }])
            /* ->with('vaccines.professional.people') */
            /*
            ->with(['vaccines.professional.people' => function ($query) {
                $query->orderBy('created_at', 'desc'); // mostra exemplos
            }])
            */
            ->with('specie');

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
                /* 'client_id' => 'int' */
            ]);

            $pet = Pet::create($data);

           /*  if (!empty($pet->client_id)) {

                $people = People::find($pet->client_id); */

               /*  Mail::to($people->email, $people->name)
                    ->send(new SendWelcomePet($pet->name, 'Henrique Douglas')); */

                    Mail::to('fabricionsilva26@gmail.com', 'Fabricio Nascimento')
                    ->send(new SendWelcomePet($pet->name, 'Fabricio Nascimento'));
          /*   } */

            return $pet;
        } catch (Exception $exception) {
            return $this->error($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
