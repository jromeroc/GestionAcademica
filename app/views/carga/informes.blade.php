@extends('layouts.master')

@section('title')
@parent
.:: Carga Académica ::.
@stop

@section('modulo')
	<h1>Carga Académica <small>Listado</small></h1>
@stop

@section('content')
<table class="table table-condensed">
	<thead>
		<tr>
			<th>Materia</th>
			<th>Curso</th>
			<th>I.H</th>
			<th colspan="3">Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($list as $listCarga)
		<tr>
			<td>{{ $listCarga->materia}}</td>
			<td>{{ $listCarga->grado}}</td>
			<td>{{ $listCarga->ih}}</td>
			<td>{{ HTML::link('carga_academica/editar/'. $listCarga->carga, 'Editar', array('class'=>'btn btn-info'));}}</td>
			<td>{{ HTML::link('carga_academica/asignar/'. $listCarga->carga, 'Asignar', array('class'=>'btn btn-primary'));}}</td>
			<td>{{ HTML::link('carga_academica/eliminar/'. $listCarga->carga, 'Eliminar', array('class'=>'btn btn-danger action-danger'));}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<div class="controls">
	{{HTML::link('carga_academica/nuevo', "Nuevo", array('class' => 'btn btn-primary'))}}
</div>

@stop