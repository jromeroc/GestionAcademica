@extends('layouts.master')

@section('title')
@parent
.:: Logros ::.
@stop

@section('modulo')
	<h1>Carga Académica <small>Asignación</small></h1>
@stop

@section('content')
	
	<table class="table table-condensed">
		<thead>
			<tr>
				<th colspan="6"><h3>{{$infoCarga['materia_srch']}} {{$infoCarga['name_grado']}}</h3></th>
			</tr>
		</thead>
		<tbody>
			<tr class="info">
				<th>Materia</th>
				<td>{{$infoCarga['materia_srch']}}</td>
				<th>Grado</th>
				<td>{{$infoCarga['name_grado']}}</td>
				<th title="Intensidad Horaria">IH</th>
				<td>{{$infoCarga['ih']}}</td>
			</tr>
		</thead>
	</table>

	{{ Form::model($infoCarga, array('url' => 'observador/nuevo', 'method' => 'POST','class'=>'form-horizontal col-sm -6'), array('role'=>'form'))}}
		<div class="form-group">
      		{{ Form::label('docente_srch', 'Docente',array('class' => 'col-sm-2 control-label')) }}
	        <div class="col-sm-2">
	          {{ Form::hidden('id_docente', Input::old('id_docente'), array('id' => 'id_docente')) }}
	          {{ Form::Text('docente_srch', null, array('placeholder' => 'Docente', 'class' => 'col-sm-2 form-control')) }}
	        </div>
      	</div>
			 	{{{ $errors->has('listperiodo') ? '**' : '' }}}
	 	@foreach ($listperiodo as $indice => $periodo)
     	 	<div class="form-group">
	        	<div class="col-sm-offset-2 col-sm-2">
					{{Form::checkbox('periodo', $indice)}}
					<label>{{$periodo}} Periodo</label>
				</div>
			</div>
	 	@endforeach
		<div class="form-group">
			{{ Form::label('materia', 'Materia', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				{{ Form::hidden('materia', Input::old('materia'), array('id' => 'materia')) }}
				{{{ $errors->has('materia') ? '**' : '' }}}
				{{ Form::input('text', 'materia_srch', Input::old('materia_srch'), array('placeholder'=>'Materia', 'id'=>'materia_srch'))}}
			</div>
		</div>
		
		<div class="form-group">
          
          <div class="col-sm-offset-2 col-sm-3">
            {{form::submit('Asignar',array('class'=>'btn btn-success'))}}           
          </div>
        </div>      	
	{{ Form::close();}}

	@if(count($cargaAssign))
	<table class="table">
		<thead>
			<tr class="success">
				<th colspan="4">Asignaciones</th>
			</tr>
			<tr>
				<th>Docente</th>
				<th>Materia</th>
				<th>Periodo</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($cargaAssign as $infoAsignacion)
				<tr>
					<td>{{$infoAsignacion['docente']}}</td>
					<td>{{$infoAsignacion['materia']}}</td>
					<td>{{$infoAsignacion['periodo']}}</td>
					<td><a href="" class="btn btn-info">Editar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@else
		<div class="col-sm-12 alert-danger">
			<h4>Esta carga academica no se ha asignado</h4>
		</div>
	@endif
@stop

@section('scripts')
	{{ HTML::script('js/scripts/carga_academica/cargaAcademica.js')}}
@stop