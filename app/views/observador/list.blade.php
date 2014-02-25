@extends('layouts.master')

@section('title')
@parent
.:: Observaciones ::.
@stop

@section('modulo')
	<h1>Observaciones <small>Todas las Observaciones</small></h1>
@stop

@section('content')

	<h2>Lista de Observaciones</h2>

	<table class="table table-striped" style="width: 900px">
    <tr>
        <th>Fecha</th>
        <th>Docente</th>
        <th>descripcion</th>
        <th>grupo</th>
        <th>Alumno</th>
        <th></th>
    </tr>
     @foreach ($datos as $info_Observador)
    <tr>
        <td>  <button id="fechaobsv"type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
              Popover on left
</button></td>
        <td>	{{ $info_Observador->docente}}</td>
        <td>	{{ $info_Observador->descripcion }}</td>
        <td>  {{ $info_Observador->namegroup }}</td>
        <td>  {{ $info_Observador->alumname }}</td>
        <td>
          <button type="button" class="btn btn-info">Ver</button>
          
          {{ HTML::link('observador/edit/'. $info_Observador->id, 'Editar', array('class'=>'btn btn-primary'));}}

          {{ HTML::link('observador/delete/'. $info_Observador->id, 'Eliminar', array('class'=>'btn btn-danger'));}}
        </td>
    </tr>
    @endforeach
  </table>
  {{ $observaciones->links() }}
@stop

@section('scripts')
  {{HTML::script('js/bootstrap.js')}}
  {{HTML::script('js/general.js')}}
  {{HTML::script('js/jquery-1.11.0.js')}}
  {{HTML::script('js/bootstrap.min.js')}}
@stop