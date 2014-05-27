@extends('layouts.master')


@section('title')
@parent
.:: Legalización ::.
@stop

@section('modulo')
  <h2>Matriculas<small>Legalizadas</small> </h2>
@stop

@section('content')

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Nombre Padre</th>
				<th>Nombre Madre</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>a</td>
				<td>a</td>
			</tr>
		</tbody>
	</table>
</div>

	<h3 class="text-center">Hijos</h3>

<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Grado </th>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>a</td>
				<td>a</td>
			</tr>
		</tbody>
	</table>
</div>

	{{ Form::open(array('url' => 'legalizacion/documentos/', 'method' => 'get','class'=>'form-inline'), array('role'=>'form'))}}
<input type="radio" id="Inscripcion" name="T-reg" value="0" checked="checked">
	{{form::radio('papa',null,'Firma solo Papa')}}
	{{Form::close()}}

@stop