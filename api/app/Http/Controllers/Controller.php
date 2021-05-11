<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\SecurityScheme(
 *     securityScheme="bearer",
 *     in="header",
 *     type="apiKey",
 *     description="Bearer Token gerado através da rota de login",
 *     name="Authorization",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 * )
 * 
 * @OA\Swagger(
 *     basePath="",
 *     schemes={"http", "https"},
 *     @OA\Info(
 *          version="1.0.0",
 *          title="API STORE MANAGEMENT",
 *          description="Api criada para cenários de administração de lojas.",
 *          @OA\Contact(
 *              email="wendel.lopes777@gmail.com.br"
 *          ),
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
