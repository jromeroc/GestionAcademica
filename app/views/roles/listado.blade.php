@extends('layouts.master')

@section('title')
.::Lista de Roles::.
@parent
@stop

@section('modulo')
<h3>Permisos Role</h3>
@stop
@section('content')
<h5>Permisos  del  Role  {{$name->nombre}} </h5>

{{ Form::open(array('url'=>'administracion/guardar', 'method' => 'post','class'=>'form-horizontal'))}}
{{Form::hidden('role', $idrol)}}

<table class="table">
    <thead>
        <tr>
            <th>Nombre del Menu </th>
            <th>Permitido</th>
            <th>No Permitido</th> 
        </tr>
    </thead>
    <tbody>
        @foreach($menu as $item)
        <tr>
            <td>{{$item->name_item}}</td>
            @foreach($permisos as $permiso)   
            @if($item->id == $permiso['permiso'])
            <td>
                {{ Form::radio('perm_'.$item->id,'1',true)}}
            </td>
            <td>
                {{ Form::radio('perm_'.$item->id,'0',false)}}
            </td>
            @elseif($permiso['permiso'] == null)   
            <td>
                {{ Form::radio('perm_'.$item->id,'1',false)}}
            </td>
            <td>
                {{ Form::radio('perm_'.$item->id,'0',true)}}
            </td>
            
            @endif


            @endforeach

            @endforeach 
    </tbody>
</table>
{{ Form::submit('Guardar', array('class' => 'btn btn-info'));}}
{{ Form::close();}}
@stop

