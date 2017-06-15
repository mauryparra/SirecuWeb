@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reportes Egresos</div>
                <div class="panel-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut semper sollicitudin libero eget finibus. Curabitur massa leo, suscipit vel eros ac, porttitor viverra neque. Vestibulum feugiat mauris ut dignissim molestie.</p>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Reporte Trimestral</th>
                                    <th>Seccional</th>
                                    <th>Total</th>
                                    <th>Egresos Por Categorias</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reportesEgresos as $reporte)
                                    <tr>
                                        <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporte->reporteTrimestral->path() }}">{{ $reporte->reporteTrimestral->trimestre->nombre . "/" . $reporte->reporteTrimestral->año . " " . $reporte->reporteTrimestral->seccional->nombre  }}</a></th>
                                        <td>{{ $reporte->seccional->nombre }}</td>
                                        <td>{{ $reporte->total }}</td>
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
