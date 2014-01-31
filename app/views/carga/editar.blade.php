@extends('layouts.master')

@section('title')
@parent
	.:: Carga Académica ::.
@stop

@section('modulo')
	<h1>Carga Académica <small>Edición</small></h1>
@stop

@section('content')

@if($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Por favor corrige los siguentes errores:</strong>
    <ul>
		@foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
      	@endforeach
	</ul>
</div>
@endif

{{ Form::model($carga, array('url' => array('carga_academica/editar/'.$carga->carga), 'method' => 'PATCH','class'=>'form-horizontal'), array('role'=>'form'))}}
	<div class="control-group">
		{{ Form::label('grupo', 'Grado', array('class' => 'control-label'))}}
		<div class="controls">
		 	{{{ $errors->has('grupo') ? '**' : '' }}}
			{{ Form::select('grupo', $grupos, Input::old('grupo'))}}
		</div>
	</div>

	<div class="control-group">
		{{ Form::label('materia', 'Materia', array('class' => 'control-label'))}}

		<div class="controls">
			{{ Form::hidden('materia', Input::old('materia'), array('id' => 'materia')) }}
			{{{ $errors->has('materia') ? '**' : '' }}}
			{{ Form::input('text', 'materia_srch', Input::old('materia_srch'), array('placeholder'=>'Materia', 'id'=>'materia_srch'))}}
		</div>
	</div>

	<div class="control-group ">
		{{ Form::label('ih', 'Intensidad horaria', array('class' => 'control-label'))}}
		<div class="controls">
			{{{ $errors->has('ih') ? '**' : '' }}}
			{{ Form::input('number', 'ih', Input::old('ih'), array('placeholder'=>'I.H', 'min' => 1, 'max' => 10))}}
		</div>
	</div>

	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Guardar', array('class' => 'btn btn-success'));}}
		</div>
	</div>
{{ Form::close();}}
@stop

@section('scripts')
	{{ HTML::script('js/scripts/cargaAcademica.js')}}
@stop
