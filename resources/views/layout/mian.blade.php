<html>

<head>
    <meta charset="utf-8">
    <html lang="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body class="bg-cyan-50 flex flex-col justify-center">
    <nav class="p-6 bg-teal-500 flex justify-between mb-6 text-white">
        <ul class="flex items-center">
            <li>
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z"
                            clip-rule="evenodd" />
                        <path fill-rule="evenodd"
                            d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="" class="p-3">Lista de itens</a>
            </li>
            <li>
                <a href="" class="p-3">Funcionarios</a>
            </li>
        </ul>

        <ul class="flex items-center">
            <li>
                <a href="/login" class="p-3">Login</a>
            </li>
            <li>
                <a href="/cadastro" class="p-3">Cadastrar</a>
            </li>
            <li>
                <a href="" class="p-3">Sair</a>
            </li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>

</body>

</html>