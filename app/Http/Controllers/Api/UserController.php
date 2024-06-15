<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * Retorna uma lista paginada dde usuários.
     * 
     * Este Método recupera uma lista paginada de usuários do banco de dados
     * e a retorna como uma resposta JSON.
     * 
     * @return \Illuminate\Http\JsonResponse
     */

   public function index():JsonResponse {
        $users = User::orderBy("id","DESC")->paginate(2);
        return response()->json([
                  'status' => true,
                  'users' => $users,
              ], 200);
    }

  /**
     * Exibe os detalhes de um usuário específico. 
     * 
     * Este Método retorna os detalhes de um usuário específico em formato JSON.
     * 
     * @param \App\Models\User $user o objeto do usuário a ser exibido
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user):JsonResponse {
        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }


    /**
     * Cria novo usuário com os dados fornecidos na requisição.
     * 
     * @param  \App\Http\Requests\UserRequest  $request O objeto de requisição contendo os dados do usuário a ser criado.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        // Iniciar a transação
        DB::beginTransaction();

        try {

            // Cadastrar usuário no banco de dados
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // Operação é concluída com êxito
            DB::commit();

            // Retorna os dados do usuário criado e uma mensagem de sucesso com status 201
            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!",
            ], 201);
        } catch (Exception $e) {

            // Operação não é concluída com êxito
            DB::rollBack();

            // Retorna uma mensagem de erro com status 400
            return response()->json([
                'status' => false,
                'message' => "Usuário não cadastrado!",
            ], 400);
        }
    }
}