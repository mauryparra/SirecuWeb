@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @include('bloques.filtro-grafico')

            <div class="panel panel-default">
                <div class="panel-heading">Gráfico</div>

                <div class="panel-body">
                    @if ( ! empty($charts))
                        @foreach ($charts as $chart)
                            {!! $chart->html() !!}
                        @endforeach
                    @else
                        Seleccionar las opciones para graficar.
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
    @if ( ! empty($charts))
        @foreach ($charts as $chart)
            {!! $chart->script() !!}
        @endforeach
    @endif
@endsection
