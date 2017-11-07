@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Informes Ingresos</div>
                <div class="panel-body">
                    <p>Fuentes de Ingresos durante el trimestre</p>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Informe Trimestral</th>
                                    <th>Total Provincial</th>
                                    <th>Coparticipación</th>
                                    <th>Total General</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporteIngreso->reporteTrimestral->path() }}">{{ $reporteIngreso->reporteTrimestral->trimestre->nombre }} {{ $reporteIngreso->reporteTrimestral->seccional->nombre }}</a></th>
                                    <td>${{ $reporteIngreso->total_provincial }}</td>
                                    <td>${{ $reporteIngreso->coparticipacion }}</td>
                                    <td>${{ $reporteIngreso->total_general }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Detalle Ingresos Mensuales</div>
                <div class="panel-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Mes</th>
                                    <th>Ingresos UDA Central</th>
                                    <th>Ingresos Provinciales</th>
                                    <th>Otros Ingresos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reporteIngreso->reportesIngresosMensuales()->get() as $reporte)
                                    <tr>
                                        <th scope="row">{{ Carbon\Carbon::parse($reporte->mes)->format('F') }}</th>
                                        <td>${{ $reporte->ingresos_central }}</td>
                                        <td>${{ $reporte->ingresos_provincial }}</td>
                                        <td>${{ $reporte->ingresos_otros }}</td>
                                    </tr>
                                @endforeach
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
