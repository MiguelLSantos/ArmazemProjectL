<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItenController;
use App\Http\Middleware\GerenteMiddleware;

//Pages
Route::get('/', [EmpresaController::class, 'showItens'])->middleware('auth');
Route::get('/cadastro', function () {
    return view('cadastro'); // Cadastro
});
Route::get('/login', function () {
    return view('login'); // Login
})->name('login');
Route::get('/funcionarios', [EmpresaController::class, 'showFuncionarios'])->middleware(GerenteMiddleware::class)->middleware('auth');
Route::get('/graficos', [EmpresaController::class, 'showGraficos'])->middleware(GerenteMiddleware::class)->middleware('auth');

//Ações
Route::post('/cadastro/createUser', [UserController::class, 'store']);// Ação do cadastro
Route::post('/cadastro/loginUser', [LoginController::class, 'login']); // Ação do login
Route::post('/logout', [LoginController::class, 'logout'])->name('sairDaConta')->middleware('auth'); // Ação do logout
Route::post('/create', [ItenController::class, 'store'])->middleware('auth'); // Ação do criar item
Route::put('/edit{id}', [ItenController::class, 'update'])->middleware('auth'); // Ação de edição de item
Route::delete('/delete{id}', [ItenController::class, 'destroy'])->name('removerItem')->middleware('auth'); // Ação do remover item
Route::get('/pdf', [ItenController::class, 'gerarPDF'])->name('ralatorioPDF')->middleware('auth'); // Ação de baxar pdf item
Route::delete('/user/delete{id}', [UserController::class, 'destroy'])->name('removerUser')->middleware(GerenteMiddleware::class)->middleware('auth'); // Ação do remover funcionario
Route::put('/funcionarios/edit{id}', [UserController::class, 'update'])->middleware('auth')->middleware(GerenteMiddleware::class); // Ação de edição de funcionario
