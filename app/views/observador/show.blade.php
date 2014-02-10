@extends('layouts.master')

@section('title')
@parent
.:: Observaciones ::.
@stop

@section('modulo')
	<h1>Observaciones: <small>Observacion #</small></h1>
@stop

@section('content')
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th><h4><strong>Fecha</strong></h4></th>
		        <th><h4><strong>id_docente</strong></h4></th>
		        <th><h4><strong>descripcion</strong></h4></th>
		        <th><h4><strong>grupo</strong></h4></th>
		        <th><h4><strong>Acciones</strong></h4></th>
			</tr>
			
		</thead>
		<tbody>
			<tr>
            <td>{{ $observacion->fecha }}</td>
            <td>{{ $observacion->id_docente }}</td>
            <td>{{ $observacion->descripcion }}</td>
        	</tr>
		</tbody>
	</table>
@stop