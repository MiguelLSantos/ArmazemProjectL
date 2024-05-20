<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItenController;

//Pages
Route::get('/', [EmpresaController::class, 'showItens'])->middleware('auth');
Route::get('/cadastro', function () {
    return view('cadastro'); // Cadastro
});

Route::get('/login', function () {
    return view('login'); // Login
})->name('login');

//Ações
Route::post('/cadastro/createUser', [UserController::class, 'store']);// Ação do cadastro
Route::post('/cadastro/loginUser', [LoginController::class, 'login']); // Ação do login
Route::post('/create', [ItenController::class, 'store'])->middleware('auth'); // Ação do criar item
Route::delete('/delete{$id}', [ItenController::class, 'destroy'])->middleware('auth'); // Ação do remover item
Route::get('/pdf', [ItenController::class, 'gerarPDF'])->middleware('auth'); // Ação de baxar pdf item
