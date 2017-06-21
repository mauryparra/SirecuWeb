@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('bloques.filtro-grafico')

            <div class="panel panel-default">
                <div class="panel-heading">Gráfico</div>

                <div class="panel-body">
                    @if ( ! empty($chart))
                        {!! $chart->render() !!}
                    @else
                        Seleccionar las opciones para graficar.
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
