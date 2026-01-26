<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // validar campos de user

        $this->validateUserFields($request);

        $values = $request->input();

        // criar usuários
        $user = User::create([
            'name' => $values['name'],
            'email' => $values['email'],
            'password' => $values['password'],
            'cpf' => $values['cpf'],
            'status' => true
        ]);

        // Criar clientes
        $values['user_id'] = $user->id;


        $client = Client::create([
            'user_id' => $values['user_id'],
            'birth_date' => $values['birth_date'],
            'phone' => $values['phone'],
            'city' => $values['city'],
        ]);

        if ($user and $client) {
            return response()->json([
                'message' => 'Client and User created successfully',
                'client' => $client,
                'user' => $user
            ], 201);
        }

        return response()->json([
            'message' => 'Error creating Client and User'
        ], 500);
    }

    private function validateUserFields(Request $request): void
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'cpf' => 'required|string|size:11|unique:users',
                'phone' => 'required|string|max:20',
                'city' => 'required|string|max:100',
                'birth_date' => 'required|date',
            ],
            [
                'cpf.size' => 'O cpf deve ter no mínimo 11 caracteres.',
                'cpf.unique' => 'O cpf informado já está em uso.',
                'email.unique' => 'O email informado já está em uso.',
                'birth_date.date' => 'A data de nascimento deve ser uma data válida.',
                'phone.required' => 'O campo telefone é obrigatório.',
                'city.required' => 'O campo cidade é obrigatório.',
                'birth_date.required' => 'O campo data de nascimento é obrigatório.',
            ]
        );
    }
}