@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('bloques.buscar')

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Informes Trimestrales</div>
                <div class="panel-body">
                    <p>Informes trimestrales cargados en la página ordenados del más reciente al más antiguo.</p>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            @if (Auth::user()->can('delete', $reporteT->first()))
                                <thead class="text-center">
                                    <tr>
                                        <th>Seccional</th>
                                        <th>Trimestre</th>
                                        <th>Año</th>
                                        <th>Saldo Inicial</th>
                                        <th>Ingresos</th>
                                        <th>Egresos</th>
                                        <th>Saldo Final</th>
                                        <th>Ingresos</th>
                                        <th>Egresos</th>
                                        <th>Acciones</th>
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
                                            <td><a class="btn btn-default btn-sm" href="{{ $reporte->ingreso->path() }}">Ver Reporte</a></td>
                                            <td><a class="btn btn-default btn-sm" href="{{ $reporte->egreso->path() }}">Ver Reporte</a></td>
                                            <td><form action="/reportes/{{ $reporte->id }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <thead class="text-center">
                                    <tr>
                                        <th>Seccional</th>
                                        <th>Trimestre</th>
                                        <th>Año</th>
                                        <th>Saldo Inicial</th>
                                        <th>Ingresos</th>
                                        <th>Egresos</th>
                                        <th>Saldo Final</th>
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
                                            <td><a class="btn btn-default btn-sm" href="{{ $reporte->ingreso->path() }}">Ver Reporte</a></td>
                                            <td><a class="btn btn-default btn-sm" href="{{ $reporte->egreso->path() }}">Ver Reporte</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
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
