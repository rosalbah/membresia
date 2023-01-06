@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Hola...</h1>
        </div>

        <div class="card-body">
            <h3>{{ Auth::user()->name }}</h3>
            <h5>Bienvenido al sistema</h5>
        </div>
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop