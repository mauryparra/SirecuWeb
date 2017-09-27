@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('Dashboard')</div>

                <div class="panel-body">
                    {!! $chart->html() !!}
                </div>
            </div>

            @include('bloques.buscar')

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">@lang('Reports')</div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut semper sollicitudin libero eget finibus. Curabitur massa leo, suscipit vel eros ac, porttitor viverra neque. Vestibulum feugiat mauris ut dignissim molestie.</p>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Seccional</th>
                                    <th>Trimestre</th>
                                    <th>Año</th>
                                    <th>Saldo Inicial</th>
                                    <th>Ingresos</th>
                                    <th>Egresos</th>
                                    <th>Saldo Final</th>
                                    <th>Ingresos/Gastos</th>
                                    <th>Ingresos</th>
                                    <th>Egresos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reporteT as $reporte)
                                    <tr>
                                        <th scope="row">{{ $reporte->seccional->nombre }}</th>
                                        <td>{{ $reporte->trimestre->nombre }}</td>
                                        <td>{{ $reporte->fecha->year }}</td>
                                        <td>${{ $reporte->saldo_inicial }}</td>
                                        <td>${{ $reporte->ingresos }}</td>
                                        <td>${{ $reporte->egresos }}</td>
                                        <td>${{ $reporte->saldo_final }}</td>
                                        <td><a class="btn btn-default btn-sm" href="{{ $reporte->path() }}">Ver Reporte</a></td>
                                        <td><a class="btn btn-default btn-sm" href="{{ $reporte->ingreso->path() }}">Ver Reporte</a></td>
                                        <td><a class="btn btn-default btn-sm" href="{{ $reporte->egreso->path() }}">Ver Reporte</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $reporteT->links() }}
                        </div>
                    </div>
                    <!-- Table -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js-scripts')
    {!! Charts::scripts(['highcharts']) !!}
    {!! $chart->script() !!}
@endsection
