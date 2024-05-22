@inject('agent', 'Jenssegers\Agent\Agent')
@extends('layout.mian')
@section('title', 'ArmazenProject')
@section('content')
    <div class="">
        <div class="flex flex-col gap-3"> {{-- Div da cabeça da página --}}
            <h1 class="text-2xl text-center">Lista de itens</h1>
            <h2 class="flex justify-center">Total de {{ count($itens) }} itens cadastrados</h2>

            <div class="inline-flex rounded-md  justify-end pr-10" role="group"> {{-- Div dos botões --}}
                <form action="">
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Adicionar item
                    </button>
                </form>
                <form action="{{ route('ralatorioPDF') }}" method="GET">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700>
                    <svg class="w-3
                        h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                        <path
                            d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>
                        Gerar PDF
                    </button>
                </form>
            </div>
            @if ($agent->isMobile())
                <div class="p-5"> {{-- Div da tabela mobile --}}
                    <table class="w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-1 py-1 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantidade de Unidades
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($itens as $item)
                                <tr>
                                    <td class="px-6 py-4 text-center whitespace-nowrap text-blue-500"> <button
                                            type="button" data-modal-target="default-modal-{{ $item->id }}"
                                            data-modal-toggle="default-modal-{{ $item->id }}">
                                            {{ substr($item->nome, 0, 20) }}
                                        </button>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->qtdunitaria }}</td>
                                </tr>
                                {{-- Modal de show --}}
                                <div id="default-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    {{ $item->nome }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-hide="default-modal-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <label for="name">Código:</label>
                                                <p class="text-base leading-relaxed text-gray-500" name="codigo">
                                                    {{ $item->codigo }}
                                                </p>
                                                <label for="descricao">Descrição:</label>
                                                <p class="text-base leading-relaxed text-gray-500" name="descricao">
                                                    {{ $item->descricao }}
                                                </p>
                                                <label for="categoria">Categoria:</label>
                                                <p class="text-base leading-relaxed text-gray-500" name="categoria">
                                                    {{ $item->categoria }}
                                                </p>
                                                <label for="preco">Preço:</label>
                                                <p class="text-base leading-relaxed text-gray-500" name="preco">
                                                    R$ {{ $item->preco }}
                                                </p>
                                                <label for="qtdunitaria">Quantidade de unidades:</label>
                                                <p class="text-base leading-relaxed text-gray-500" name="qtdunitaria">
                                                    {{ $item->qtdunitaria }}
                                                </p>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                                                <button type="button" data-modal-target="crud-modal-{{ $item->id }}"
                                                    data-modal-toggle="crud-modal-{{ $item->id }}"
                                                    data-modal-hide="default-modal-{{ $item->id }}"
                                                    class="text-black bg-white-700 hover:bg-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium border border-black  rounded-lg text-sm px-5 py-2.5 text-center">Editar</button>
                                                <button type="button" data-modal-target="popup-modal-{{ $item->id }}"
                                                    data-modal-toggle="popup-modal-{{ $item->id }}"
                                                    data-modal-hide="default-modal-{{ $item->id }}"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-white focus:outline-none bg-red-500 rounded-lg border border-red-200 hover:bg-red-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-red-100">Remover</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Div do modal de Edição --}}
                                <div id="crud-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class=" relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shado">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    Editar o item {{ $item->nome }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="crud-modal-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" method="POST" action="/edit{{ $item->id }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-5">
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="codigo"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Código</label>
                                                        <input type="number" name="codigo" id="codigo"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                            placeholder="Código do item" value="{{ $item->codigo }}"
                                                            required="">
                                                    </div>
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="nome"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                                            <input type="text" name="nome" id="nome"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Nome do item" value="{{ $item->nome }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="categoria"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                                                            <input type="text" name="categoria" id="categoria"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Categoria" value="{{ $item->categoria }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="descricao"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                                                            <input type="text" name="descricao" id="descricao"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Descrição" value="{{ $item->descricao }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="preco"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
                                                            <input type="number" name="preco" id="preco"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="R$0000" value="{{ $item->preco }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="qtdunitaria"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Quantidade
                                                                de unidades</label>
                                                            <input type="number" name="qtdunitaria" id="qtdunitaria"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Unidades" value="{{ $item->qtdunitaria }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Editar
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Modal de Remoção --}}
                                <div id="popup-modal-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="popup-modal-{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Você deseja remover o
                                                    produto {{ $item->nome }} ?</h3>
                                                <form action="{{ route('removerItem', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal-{{ $item->id }}"
                                                        type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Sim
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Não,
                                                    Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum item
                                        cadastrado
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
                <div class="p-10"> {{-- Div da tabela --}}
                    <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Código
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descrição
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoria
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Preço
                                </th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantidade de Unidades
                                </th>
                                <th class="text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($itens as $item)
                                <tr>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->codigo }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->nome }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->descricao }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->categoria }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">R$ {{ $item->preco }}</td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">{{ $item->qtdunitaria }}</td>
                                    <td class="">
                                        <button type="button" data-modal-target="crud-modal-{{ $item->id }}"
                                            data-modal-toggle="crud-modal-{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>
                                        <button type="button" data-modal-target="popup-modal-{{ $item->id }}"
                                            data-modal-toggle="popup-modal-{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Div do modal de Edição --}}
                                <div id="crud-modal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class=" relative p-4 w-full max-w-md max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shado">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    Editar o item {{ $item->nome }}
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                    data-modal-toggle="crud-modal-{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form class="p-4 md:p-5" method="POST" action="/edit{{ $item->id }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="p-5">
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="codigo"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Código</label>
                                                        <input type="number" name="codigo" id="codigo"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                            placeholder="Código do item" value="{{ $item->codigo }}"
                                                            required="">
                                                    </div>
                                                    <div class="grid gap-4 mb-4 grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="nome"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                                            <input type="text" name="nome" id="nome"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Nome do item" value="{{ $item->nome }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="categoria"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                                                            <input type="text" name="categoria" id="categoria"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Categoria" value="{{ $item->categoria }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="descricao"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                                                            <input type="text" name="descricao" id="descricao"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Descrição" value="{{ $item->descricao }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="preco"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
                                                            <input type="number" name="preco" id="preco"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="R$0000" value="{{ $item->preco }}"
                                                                required="">
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="qtdunitaria"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Quantidade
                                                                de unidades</label>
                                                            <input type="number" name="qtdunitaria" id="qtdunitaria"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                                placeholder="Unidades" value="{{ $item->qtdunitaria }}"
                                                                required="">
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        Editar
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal de Remoção --}}
                                <div id="popup-modal-{{ $item->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="popup-modal-{{ $item->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500">Você deseja remover o
                                                    produto {{ $item->nome }} ?</h3>
                                                <form action="{{ route('removerItem', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal-{{ $item->id }}"
                                                        type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Sim
                                                    </button>
                                                </form>
                                                <button data-modal-hide="popup-modal-{{ $item->id }}" type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Não,
                                                    Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum item
                                        cadastrado
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
        {{-- Modal de Criação --}}
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shado">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Criar um Item novo
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" method="POST" action="/create">
                        @csrf
                        <div class="col-span-2 sm:col-span-1">
                            <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900">Código</label>
                            <input type="number" name="codigo" id="codigo"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Código do item" required="">
                        </div>
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="nome" class="block mb-2 text-sm font-medium text-gray-900">Nome</label>
                                <input type="text" name="nome" id="nome"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Nome do item" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="categoria"
                                    class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
                                <input type="text" name="categoria" id="categoria"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Categoria" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="descricao"
                                    class="block mb-2 text-sm font-medium text-gray-900">Descrição</label>
                                <input type="text" name="descricao" id="descricao"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Descrição" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="preco" class="block mb-2 text-sm font-medium text-gray-900">Preço</label>
                                <input type="number" name="preco" id="preco"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="R$0000" required="">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="qtdunitaria" class="block mb-2 text-sm font-medium text-gray-900">Quantidade
                                    de unidades</label>
                                <input type="number" name="qtdunitaria" id="qtdunitaria"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                    placeholder="Unidades" required="">
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Criar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endsection
