@extends('layouts.master')

@section('title')
@parent
.:: Observaciones ::.
@stop

@section('modulo')
	<h1>Observaciones: <small>Observacion # {{$Observacion->id}}</small></h1>
@stop

@section('content')
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Fecha</th>
		        <th>Id Docente</th>
		        <th>Descripcion</th>
		        <th>Grupo</th>
		        <th>Created</th>
		        <th>Updated</th>
			</tr>
			
		</thead>
		<tbody>
			<tr>
            <td>{{ $Observacion->fecha }}</td>
            <td>{{ $Observacion->id_docente }}</td>
            <td>{{ $Observacion->descripcion }}</td>
            <td>{{ $Observacion->grupo }}</td>
            <td>{{ $Observacion->created_at }}</td>
            <td>{{ $Observacion->updated_at }}</td>
        	</tr>
		</tbody>
	</table>
@stop