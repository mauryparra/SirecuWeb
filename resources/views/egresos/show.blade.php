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
                                    <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporteEgreso->reporteTrimestral->path() }}">{{ $reporteEgreso->reporteTrimestral->trimestre->nombre }} {{ $reporteEgreso->reporteTrimestral->seccional->nombre }}</a></th>
                                    <td>{{ $reporteEgreso->reporteTrimestral->seccional->nombre }}</td>
                                    <td>${{ $reporteEgreso->total }}</td>
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
                                @foreach ($reporteEgreso->reportesEgresosCategorias as $reporte)
                                    <tr>
                                        <th scope="row">{{ $reporte->categoriaGasto->nombre }}</th>
                                        <td>${{ $reporte->total_mes_1 }}</td>
                                        <td>${{ $reporte->total_mes_2 }}</td>
                                        <td>${{ $reporte->total_mes_3 }}</td>
                                        <td>${{ $reporte->totalSeccional() }}</td>
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
                                    <th scope="row"><a class="btn btn-default btn-sm" href="{{ $reporteEgreso->reporteTrimestral->path() }}">{{ $reporteEgreso->reporteTrimestral->trimestre->nombre }} {{ $reporteEgreso->reporteTrimestral->seccional->nombre }}</a></th>
                                    <td>UDA Central</td>
                                    <td>${{ $reporteEgreso->total_central }}</td>
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
                                @foreach ($reporteEgreso->reportesEgresosCategorias as $reporte)
                                    <tr>
                                        <th scope="row">{{ $reporte->categoriaGasto->nombre }}</th>
                                        <td>${{ $reporte->total_mes_1_central }}</td>
                                        <td>${{ $reporte->total_mes_2_central }}</td>
                                        <td>${{ $reporte->total_mes_3_central }}</td>
                                        <td>${{ $reporte->totalCentral() }}</td>
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
