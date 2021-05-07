<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::group(['middleware' => ['jwt-auth'] ], function(){

    /** Autenticação */
    require base_path('routes/api/auth.php');

});