@extends('layouts.master')
<?php
$estado = array(1 => 'Activo', 0 => 'Inactivo');
?>
@section('title')
.::Informes de menu::.
@parent
@stop

@section('modulo')
<h2>Lista de Menú  Disponibles</h2>
@stop

@section('content')
@if($listado)
<table class="table">
    <thead>
        <tr>
            <th>Nombre del item</th>
            <th>Nombre URL </th>
            <th>Estado</th>
            <th>Fecha en que se creo</th>
            <th></th>
        </tr>
    </thead>
    @foreach($listado as $listar)
    <tbody>
        <tr>
            <td>{{$listar->name_item}}</td>
            <td>{{$listar->url}}</td>
            <td>{{ $estado[$listar->estado]}}</td>
            <td>{{$listar->created_at}} </td>
            <td><a href="editar/{{$listar->id}}" class="btn btn-info" > Editar</a></td>
        </tr>
    </tbody>
    @endforeach
</table>
@else
No  se encontraron menus  disponibles.
@endif

<a href="nuevo" class="btn btn-info" >Nuevo Menú</a>




















@stop