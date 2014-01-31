@extends('layouts.master')

@section('title')
.::Editar menu::.
@parent
@stop

@section('modulo')
	<h1>Editar  Menú</h1>
@stop

@section('content')
{{ Form::open(array('url'=>'menu/save', 'method' => 'post','class'=>'form-horizontal'))}}
         {{ Form::hidden('id', $info['id']) }}
	<div class="control-group">
		{{Form::label('nombre', 'Nombre', array('class' => 'control-label'))}}
		<div class="controls">
			{{ Form::Input('text','nombre', $info['name_item'])}}
		</div>
	</div>
	<div class="control-group">
		{{ Form::label('url', 'URL', array('class' => 'control-label'))}}
		<div class="controls">
			{{ Form::Input('text','url', $info['url'])}}
		</div>
	</div>
	<div class="control-group">
		{{Form::label('estado', 'EStado', array('class' => 'control-label'))}}
        	<div class="controls">
			{{ Form::checkbox('estado', true)}}
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			{{ Form::submit('Guardar', array('class' => 'btn'));}}
		</div>
	</div>
{{ Form::close()}}
@stop