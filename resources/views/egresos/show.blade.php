@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reporte de Egresos Seccional</div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporteSecc->reporteTrimestral->path() }}">{{ $reporteSecc->reporteTrimestral->trimestre->nombre }} {{ $reporteSecc->reporteTrimestral->seccional->nombre }}</a></th>
                                    <td>{{ $reporteSecc->seccional->nombre }}</td>
                                    <td>{{ $reporteSecc->total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->

                    <div class="panel-heading">Egresos por Categoría de Seccional</div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Categoria Gasto</th>
                                    <th>Primer Mes</th>
                                    <th>Segundo Mes</th>
                                    <th>Tercer Mes</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reporteSecc->reporteEgresosCategorias()->get() as $reporte)
                                    <tr>
                                        <th scope="row">{{ $reporte->categoriaGasto->nombre }}</th>
                                        <td>{{ $reporte->total_mes_1 }}</td>
                                        <td>{{ $reporte->total_mes_2 }}</td>
                                        <td>{{ $reporte->total_mes_3 }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->
                </div>
            </div>

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Reporte de Egresos por UDA Central</div>
                <div class="panel-body">

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Reporte Trimestral</th>
                                    <th>Seccional</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporteCentral->reporteTrimestral->path() }}">{{ $reporteCentral->reporteTrimestral->trimestre->nombre }} {{ $reporteCentral->reporteTrimestral->seccional->nombre }}</a></th>
                                    <td>{{ $reporteCentral->seccional->nombre }}</td>
                                    <td>{{ $reporteCentral->total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Table -->

                    <div class="panel-heading">Egresos por Categoría de UDA Central</div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Categoria Gasto</th>
                                    <th>Primer Mes</th>
                                    <th>Segundo Mes</th>
                                    <th>Tercer Mes</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reporteCentral->reporteEgresosCategorias()->get() as $reporte)
                                    <tr>
                                        <th scope="row">{{ $reporte->categoriaGasto->nombre }}</th>
                                        <td>{{ $reporte->total_mes_1 }}</td>
                                        <td>{{ $reporte->total_mes_2 }}</td>
                                        <td>{{ $reporte->total_mes_3 }}</td>
                                        <td></td>
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
