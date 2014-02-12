@extends('layouts.master')

@section('title')
@parent
.:: Logros ::.
@stop

@section('modulo')
	<h1>Carga Académica <small>Asignación</small></h1>
@stop

@section('content')
	<h3>Asignación carga académica</h3> 
	<a href="#modalAssign" role="button" class="btn" data-toggle="modal">Asignar</a>
	<table class="table table-condensed alert alert-info">
		<tbody>
			<th>Materia</th>
			<td>{{$infoCarga[0]['materia']}}</td>
			<th>Grado</th>
			<td>{{$infoCarga[0]['grado']}}</td>
			<th title="Intensidad Horaria">IH</th>
			<td>{{$infoCarga[0]['ih']}}</td>
		</thead>
	</table>

	<div id="modalAssign" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Modal header</h3>
	  </div>
	  <div class="modal-body">
		{{ Form::model($cargaAssign, array('route' => ''))}}
		{{ Form::close();}}
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
	    <button class="btn btn-primary">Guardar</button>
	  </div>
	</div>
@stop