<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

//Pages
Route::get('/', function () {
    return view('welcome')->middleware('auth');; // Home
});
Route::get('/cadastro', function(){
    return view('cadastro'); // Cadastro
});
Route::get('/login', function () {
    return view('login'); // Login
});



//Ações
Route::post('/cadastro/createUser', [UserController::class, 'store']);
Route::post('/cadastro/loginUser', [UserController::class, 'store']);// Ação do cadastro
