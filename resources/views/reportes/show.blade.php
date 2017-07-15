@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reporte Trimestral</div>
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
                                    <th>Ingresos</th>
                                    <th>Egresos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{ $reporteT->seccional->nombre }}</th>
                                    <td>{{ $reporteT->trimestre->nombre }}</td>
                                    <td>{{ $reporteT->fecha->year }}</td>
                                    <td>${{ $reporteT->saldo_inicial }}</td>
                                    <td>${{ $reporteT->ingresos }}</td>
                                    <td>${{ $reporteT->egresos }}</td>
                                    <td>${{ $reporteT->saldo_final }}</td>
                                    <td><a class="btn btn-default btn-sm" href="{{ $reporteT->ingreso->path() }}">Ver Reporte</a></td>
                                    <td><a class="btn btn-default btn-sm" href="{{ $reporteT->egreso->path() }}">Ver Reporte</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
