@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Usuarios</div>
                <div class="panel-body">
                    <p>Lista de Usuarios Registrados en SireCu Web</p>

                    <!-- Table -->
                    <div class="panel panel-default table-responsive">
                        <div class="panel-heading text-right">
                            <a href="{{ route('usuarios.create') }}" class="btn btn-default btn-sm">@lang('Add User')</a>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->name }}</th>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->implode('name', ', ') }}</td>
                                        <td>
                                            <a href="/usuarios/{{ $user->id }}/edit" class="btn btn-default btn-sm">@lang('Edit')</a>
                                            <form style="display: inline" action="/usuarios/{{ $user->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger btn-sm">@lang('Delete')</button>
                                        </form></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {{ $users->links() }}
                        </div>
                    </div>
                    <!-- Table -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
