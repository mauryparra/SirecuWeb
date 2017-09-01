@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reportes Ingresos</div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut semper sollicitudin libero eget finibus. Curabitur massa leo, suscipit vel eros ac, porttitor viverra neque. Vestibulum feugiat mauris ut dignissim molestie.</p>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Reporte Trimestral</th>
                                    <th>Total Provincial</th>
                                    <th>Coparticipación</th>
                                    <th>Total General</th>
                                    <th>Ingresos Mensuales</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reportesIngresos as $reporte)
                                    <tr>
                                        <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporte->reporteTrimestral->path() }}">{{ $reporte->reporteTrimestral->trimestre->nombre . "/" . $reporte->reporteTrimestral->fecha->year . " " . $reporte->reporteTrimestral->seccional->nombre  }}</a></th>
                                        <td>${{ $reporte->total_provincial }}</td>
                                        <td>${{ $reporte->coparticipacion }}</td>
                                        <td>${{ $reporte->total_general }}</td>
                                        <td><a class="btn btn-default btn-sm" href="{{ $reporte->path() }}">Ver Detalles</a></td>
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
