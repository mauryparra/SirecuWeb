@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Hubo un problema</div>
                <div class="panel-body">
                    @lang($exception->getMessage())
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
