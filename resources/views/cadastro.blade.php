@extends('layout.mian')
@section('title', 'Cadastre-se')
@section('content')
    <h1 class="text-2xl text-center">Faça o seu cadastro</h1>
    <form class="flex flex-col items-center gap-5" method="POST" action="/cadastro/createUser">
        @csrf
        <div class="w-4/12">
            <label for="text">
                <span class="text-sm font-medium text-slate-700">Nome</span>
            </label>
            <div class="">
                <input required type="text" id="name" name="name"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Seu nome" />
            </div>
        </div>
        <div class="w-4/12">
            <label for="email">
                <span class="text-sm font-medium text-slate-700">Email</span>
            </label>
            <div class="">
                <input required type="email" id="email" name="email"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="seu@email.com" />
            </div>
        </div>
        <div class="w-4/12">
            <label for="password">
                <span class="text-sm font-medium text-slate-700">Senha</span>
            </label>
            <div class="">
                <input required type="password" id="password" name="password"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Sua senha" />
            </div>
        </div>
        <div class="w-4/12">
            <label for="empresa_id">
                <span class="text-sm font-medium text-slate-700">Id da empresa</span>
            </label>
            <div class="">
                <input required type="number" id="empresa_id" name="empresa_id"
                    class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-full rounded-md sm:text-sm focus:ring-1"
                    placeholder="Sua senha" />
            </div>
        </div>
        <div class="w-4/12">
            <fieldset>
                <legend>Tipo do perfil</legend>

                <input id="comum" class="peer/comum" type="radio" name="is_gerente" value="0" checked />
                <label for="comum" class="peer-checked/comum:text-sky-500">Usuário comum</label>

                <input id="gerente" class="peer/gerente" type="radio" name="is_gerente" value="1" />
                <label for="gerente" class="peer-checked/gerente:text-sky-500">Usuário gerente</label>

                <div class="hidden peer-checked/comum:block">Usuário comum</div>
                <div class="hidden peer-checked/gerente:block">Usuário gerente</div>
            </fieldset>

        </div>
        <div class="w-4/12 flex justify-end">
            <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 rounded-lg text-white">
                Cadastrar
            </button>
        </div>
    </form>
@endsection
