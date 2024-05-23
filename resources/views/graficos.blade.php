@inject('agent', 'Jenssegers\Agent\Agent')
@extends('layout.mian')
@section('title', 'Gráficos')
@section('content')

    @if ($agent->isMobile())
        <canvas class="p-10" id="myChartMobile" width="500" height="200"></canvas>
        <script>
            var ctx = document.getElementById('myChartMobile').getContext('2d');
            var myChartMobile = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        @foreach ($itens as $item)
                            '{{ $item['nome'] }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Gráficos de itens',
                        data: [
                            @foreach ($itens as $item)
                                {{ $item['qtdunitaria'] }},
                            @endforeach
                        ],

                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @else
        <canvas class="p-10" id="myChartDescktop" width="500" height="200"></canvas>
        <script>
            var ctx = document.getElementById('myChartDescktop').getContext('2d');
            var myChartDescktop = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach ($itens as $item)
                            '{{ $item['nome'] }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Gráficos de itens',
                        data: [
                            @foreach ($itens as $item)
                                {{ $item['qtdunitaria'] }},
                            @endforeach
                        ],

                    }]
                },
                options: {
                    responsive: true
                }
            });
        </script>
    @endif

@endsection
