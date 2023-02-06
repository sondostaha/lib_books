<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiBookController;

use App\Http\Controllers\ApiAuthController;

Route::middleware('isApiUser')->group(function () {

    
    //store
    Route::post('/books/store', [ApiBookController::class, 'store']);
    //update
    Route::post('/books/update/{id}', [ApiBookController::class, 'update']);
    //deleted
    Route::get('/books/delete/{id}', [ApiBookController::class, 'delete']);
});

Route::get('/books', [ApiBookController::class, 'index']);
    //show
Route::get('/books/show/{id}', [ApiBookController::class, 'show']);
//register
Route::Post('/handl-register', [ApiAuthController::class, 'handleRegister']);
//login
 Route::Post('/handl-login', [ApiAuthController::class, 'handleLogin']);
 //logut
 Route::get('/logout', [ApiAuthController::class, 'logout']);