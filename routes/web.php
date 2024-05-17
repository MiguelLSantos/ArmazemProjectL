<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;

//Pages
Route::get('/', function () {
    return view('welcome'); // Home
})->middleware('auth');

Route::get('/cadastro', function () {
    return view('cadastro'); // Cadastro
});

Route::get('/login', function () {
    return view('login'); // Login
})->name('login');

//Ações
Route::post('/cadastro/createUser', [UserController::class, 'store']);
Route::post('/cadastro/loginUser', [LoginController::class, 'login']);// Ação do cadastro
