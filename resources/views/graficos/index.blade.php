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
                        {!! $chart->html() !!}
                    @else
                        Seleccionar las opciones para graficar.
                    @endif

                    @if ( ! empty($chart2))
                        {!! $chart2->html() !!}
                    @endif

                    @if ( ! empty($chart3))
                        {!! $chart3->html() !!}
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('js-scripts')
    <script>
    $(document).ready(function(){
        $("#tipo-grafico").change(function(){
            $("#tipo-grafico option:selected").each(function(){
                if($(this).attr('value')=="gastosTrimestre"){
                    $(".rango input").attr('disabled', 'disabled');
                    $(".rango select").attr('disabled', 'disabled');
                    $("label[for='trimestreDesde']").html('Trimestre');
                } else {
                    $(".rango input").removeAttr('disabled');
                    $(".rango select").removeAttr('disabled');
                    $("label[for='trimestreDesde']").html('Desde');
                }
            });
        }).change();
    });
    </script>
    {!! Charts::scripts(['highcharts']) !!}
    @if ( ! empty($chart))
        {!! $chart->script() !!}
    @endif

    @if ( ! empty($chart2))
        {!! $chart2->script() !!}
    @endif

    @if ( ! empty($chart3))
        {!! $chart3->script() !!}
    @endif
@endsection
