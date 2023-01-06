@extends('adminlte::page')

@section('title', 'Dasboard')

@section('content_header')
    <h1>Lista de suscripciones</h1>
@stop

@section('content')
    <div class="card bg-indigo-600"">
        <div class="card-header">
            <h1 class="card-title text-lg font-bold">Suscrito con éxito</h1><br>
        </div>
    </div>   
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop