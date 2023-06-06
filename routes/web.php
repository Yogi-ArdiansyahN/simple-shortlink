<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [LinkController::class, 'index']);

    Route::prefix('link')->group(function () {
        Route::get('/', [LinkController::class, 'index']);
        Route::get('create', [LinkController::class, 'create']);
        Route::get('edit', [LinkController::class, 'edit']);

        Route::post('/', [LinkController::class, 'store']);
        Route::put('/{link}', [LinkController::class, 'update']);
        Route::delete('/{link}', [LinkController::class, 'delete']);
    });

    Route::post('/logout', [LoginController::class, 'logout']);
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authLogin']);

    Route::get('/daftar', [AuthController::class, 'register']);
    Route::post('/daftar', [AuthController::class, 'authRegister']);
});

// redirect user/guest ke link original via shortlink
Route::get('/(:any)', [LinkController::class, 'redirect']);

Route::get('/test', function () {
    // return App::make('url')->to('/');
    return auth()->user();
});
