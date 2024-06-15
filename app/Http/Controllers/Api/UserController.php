<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
