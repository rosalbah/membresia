@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.roles.create') }}"> Nuevo rol</a>
    <h1>Lista de roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary bt-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger bt-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        
        </div>
        
    </div>   
@stop
