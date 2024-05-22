@extends('layout.mian')
@section('title', 'Login')
@section('content')
    @if ($errors->has('email'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-blue-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                Erro: {{ $errors->first('email') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-white-500 rounded-lg focus:ring-2 focus:ring-white-400 p-1.5 hover:bg-white-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    @if ($errors->has('password'))
        <div id="alert-1" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-blue-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                Erro: {{ $errors->first('password') }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-white-500 rounded-lg focus:ring-2 focus:ring-white-400 p-1.5 hover:bg-white-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif


    <h1 class="text-2xl text-center">Faça o seu login</h1>
    <form class="flex flex-col items-center justify-center gap-5" method="POST" action="/cadastro/loginUser">
        @csrf
        <div class="w-4/12">
            <label for="email">
                <span class="text-sm font-medium text-slate-700">Email</span>
            </label>

            <input required type="email" id="email" name="email"
                class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="seu@email.com" />

        </div>
        <div class="w-4/12">
            <label for="password">
                <span class="text-sm font-medium text-slate-700">Senha</span>
            </label>

            <input required type="password" id="password" name="password"
                class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                placeholder="Sua senha" />

        </div>
        <div class="w-4/12 flex justify-end">
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 rounded-lg text-white">
                Entrar
            </button>
        </div>
    </form>
@endsection
