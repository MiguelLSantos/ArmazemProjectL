<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
    @vite('resources/css/app.css')
    <style>
        input {
            text-indent: 10px;
        }
    </style>
</head>

<body class="bg-cyan-50 flex flex-col justify-center">
    <main class="">
        <h1 class="text-2xl text-center">Faça o seu cadastro</h1>
        <form class="flex flex-col items-center gap-5" >
            <div class="w-6/12">
                <label for="text">
                    <span class="text-sm font-medium text-slate-700">Nome</span>
                </label>
                <div class="">
                    <input required type="text" id="text"
                        class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Seu nome" />
                </div>
            </div>
            <div class="w-6/12">
                <label for="email">
                    <span class="text-sm font-medium text-slate-700">Email</span>
                </label>
                <div class="">
                    <input required type="email" id="email"
                        class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                        placeholder="seu@email.com" />
                </div>
            </div>
            <div class="w-6/12">
                <label for="password">
                    <span class="text-sm font-medium text-slate-700">Senha</span>
                </label>
                <div class="">
                    <input required type="password" id="password"
                        class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Sua senha" />
                </div>
            </div>
            <div class="w-6/12">
                <label for="empresaId">
                    <span class="text-sm font-medium text-slate-700">Id da empresa</span>
                </label>
                <div class="">
                    <input required      type="number" id="empresaId"
                        class="mt-1 py-2 px-auto bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 w-10/12 rounded-md sm:text-sm focus:ring-1"
                        placeholder="Sua senha" />
                </div>
            </div>
            <div class="w-6/12">
                <fieldset>
                    <legend>Tipo do perfil</legend>

                    <input id="comum" class="peer/comum" type="radio" name="status" checked />
                    <label for="comum" class="peer-checked/comum:text-sky-500">Usuário comum</label>

                    <input id="gerente" class="peer/gerente" type="radio" name="status" />
                    <label for="gerente" class="peer-checked/gerente:text-sky-500">Usuário gerente</label>

                    <div class="hidden peer-checked/comum:block">Usuário comum</div>
                    <div class="hidden peer-checked/gerente:block">Usuário gerente</div>
                </fieldset>
            </div>
            <div class="w-6/12">
                <button type="submit" class="bg-sky-500 hover:bg-sky-700 p-1 rounded-lg text-white">
                    Cadastrar
                </button>
            </div>
        </form>
    </main>
</body>

</html>
