@extends('layouts.master')

@section('title')
.::Lista de Roles::.
@parent
@stop

@section('modulo')
<h3>Permisos Role</h3>
@stop
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Role</th>
            <th></th>
        </tr>
    </thead>
    @foreach($listado as $lista)  
    <tbody>
        <tr>
            <td>{{$lista->nombre}}</td>
            <td><a href="permisos_role/{{$lista->id}}" class="btn btn-info" >Cambiar permisos</a></td>
        </tr>
    </tbody>
    @endforeach
</table>

@stop