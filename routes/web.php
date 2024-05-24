<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItenController;
use App\Http\Middleware\GerenteMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\InitController;

//Pages
Route::get('/init', [InitController::class, 'page'] )->name('init');
Route::get('/', [EmpresaController::class, 'showItens'])->middleware(Authenticate::class);
Route::get('/cadastro', function () {
    return view('cadastro'); // Cadastro
});
Route::get('/login', function () {
    return view('login'); // Login
})->name('login');
Route::get('/funcionarios', [EmpresaController::class, 'showFuncionarios'])->middleware(GerenteMiddleware::class)->middleware(Authenticate::class);
Route::get('/graficos', [EmpresaController::class, 'showGraficos'])->middleware(GerenteMiddleware::class)->middleware(Authenticate::class);

//Ações
Route::post('/cadastro/createUser', [UserController::class, 'store']);// Ação do cadastro
Route::post('/cadastro/loginUser', [LoginController::class, 'login']); // Ação do login
Route::post('/logout', [LoginController::class, 'logout'])->name('sairDaConta')->middleware(Authenticate::class); // Ação do logout
Route::post('/create', [ItenController::class, 'store'])->middleware(Authenticate::class); // Ação do criar item
Route::put('/edit{id}', [ItenController::class, 'update'])->middleware(Authenticate::class); // Ação de edição de item
Route::delete('/delete{id}', [ItenController::class, 'destroy'])->name('removerItem')->middleware(Authenticate::class); // Ação do remover item
Route::get('/pdf', [ItenController::class, 'gerarPDF'])->name('ralatorioPDF')->middleware(Authenticate::class); // Ação de baxar pdf item
Route::delete('/user/delete{id}', [UserController::class, 'destroy'])->name('removerUser')->middleware(GerenteMiddleware::class)->middleware(Authenticate::class); // Ação do remover funcionario
Route::put('/funcionarios/edit{id}', [UserController::class, 'update'])->middleware(Authenticate::class)->middleware(GerenteMiddleware::class); // Ação de edição de funcionario
