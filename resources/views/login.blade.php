@extends('layout.mian')
@section('title', 'Login')
@section('content')
    <h1 class="text-2xl text-center">Faça o seu login</h1>
    <form class="flex flex-col items-center gap-5" method="POST" action="/cadastro/loginUser">
        @csrf
        <div class="w-6/12">
            <label for="email">
                <span class="text-sm font-medium text-slate-700">Email</span>
            </label>
            <div class="">
                <input required type="email" id="email" name="email"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                    placeholder="seu@email.com" />
            </div>
        </div>
        <div class="w-6/12">
            <label for="password">
                <span class="text-sm font-medium text-slate-700">Senha</span>
            </label>
            <div class="">
                <input required type="password" id="password" name="password"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                    placeholder="Sua senha" />
            </div>
        </div>
        <div class="w-6/12">
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 rounded-lg text-white">
                Entrar
            </button>
        </div>
    </form>
@endsection
