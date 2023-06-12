<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [LinkController::class, 'index']);

    Route::get("/me", [Controller::class, 'profil']);

    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index']);
        Route::get('create', [LinkController::class, 'create']);
        Route::get('edit/{link}', [LinkController::class, 'edit']);
        Route::get('/{link}', [LinkController::class, 'show']);

        Route::post('/', [LinkController::class, 'store']);
        Route::put('/{link}', [LinkController::class, 'update']);
        Route::delete('/{link}', [LinkController::class, 'destroy']);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authLogin']);

    Route::get('/daftar', [AuthController::class, 'register']);
    Route::post('/daftar', [AuthController::class, 'authRegister']);
});


// redirect user/guest ke link original via shortlink
Route::get('/to/{shortLink}', [LinkController::class, 'redirect']);
