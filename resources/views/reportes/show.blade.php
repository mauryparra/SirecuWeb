@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Informe Trimestral</div>
                <div class="panel-body">
                    <p>En la siguiente tabla se muestran los balances generales del informe trimestral, utilizar los botones para ver los informes de egresos e ingresos.</p>

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
                                    <td><a class="btn btn-default btn-sm" href="{{ $reporteT->ingreso->path() }}">Ver Informe</a></td>
                                    <td><a class="btn btn-default btn-sm" href="{{ $reporteT->egreso->path() }}">Ver Informe</a></td>
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
