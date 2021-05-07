<?php 

namespace App\Services\Auth\Exception\Types;

use App\Services\Auth\Exception\Interfaces\IExceptionResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenExpiredException implements IExceptionResponse
{
    public function response()
    {
        $refreshed = JWTAuth::refresh(JWTAuth::getToken());

        return response()->json([
            'message' => 'Token is Expired',
            'refreshed_token' => $refreshed
        ], 401);
    }
}