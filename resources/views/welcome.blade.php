@extends('layout.mian')
@section('title', 'ArmazenProject')
@section('content')
    <div class="">
        <div class="flex flex-col gap-3"> {{-- Div da cabeça da página --}}
            <h1 class="text-2xl text-center">Lista de itens</h1>
            <h2 class="flex justify-center">Total de {{ count($itens) }} itens cadastrados</h2>
            <div class="flex justify-end pr-10">{{-- Div do botão--}}
                <button type="button" class="w-36 bg-sky-500 hover:bg-sky-700 p-1 rounded-lg text-white">
                    <div class="flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <p>Adicionar item</p>
                    </div>
                </button>
            </div>
        </div>
        <div class="p-10"> {{-- Div da tabela --}}
            <table class="min-w-full divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Código
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Nome
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Descrição</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Categoria</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Preço
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantidade de Unidades</th>
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
                            <td><a href=""></a><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum item cadastrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
