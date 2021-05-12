<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/auth/login",
     * summary="Autenticação por email e senha",
     * description="Autenticação do funcionário deve ser realizada através de email e senha",
     * operationId="auth.login",
     * tags={"AuthController"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Credenciais do funcionário",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="email", type="string", format="email", example="employee@mail.com.br"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *    ),
     * ),
     * @OA\Response(
     *    response=401,
     *    description="Resposta para credenciais inválidas",
     *    @OA\JsonContent(
     *       @OA\Property(property="error", type="string", example="Usuário ou senha inválidos")
     *        )
     *     )
     * )
     */
    public function login(LoginRequest $request)
    {
        try {
            
            $credentials = $request->validated();
    
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Usuário ou senha inválidos'], JsonResponse::HTTP_UNAUTHORIZED);
            }
    
            return $this->respondWithToken($token);

        } catch (\Exception $e){
            return response()->json(['error' => 'Erro ao processar requisição'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /** 
     * @OA\Post(
     *     path="/api/auth/profile",
     *     summary="Obter dados de funcionário logado",
     *     description="Retorno de dados do funcionário logado a partir do Token informado no Header",
     *     operationId="auth.profile",
     *     tags={"AuthController"},
     *     security={{ "bearer": {} }},
     * 
     *     @OA\Response(response="200", description="Retorna os dados do funcionário logado"),
     *     @OA\Response(response="400", description="JSON com response de token não informado")
     * )
     */   
    public function profile()
    {
        return response()->json(auth()->user());
    }

    /**     
     * @OA\Post(
     *     path="/api/auth/logout",
     *     summary="Deslogar",
     *     description="Inválida o Token e encerra a session",
     *     operationId="auth.logout",
     *     tags={"AuthController"},
     *     security={{ "bearer": {} }},
     * 
     *     @OA\Response(response="200", description="Json com mensagem de sucesso"),
     *     @OA\Response(response="400", description="JSON com response de token não informado")
     * )
     */  
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Deslogado com sucesso']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}