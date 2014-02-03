@extends('layouts.master')

@section('title')
.::Nuevo menu::.
@parent
@stop

@section('modulo')
<h1>Crear Menú</h1>
@stop

@section('content')
{{ Form::open(array('url'=>'menu/guardar', 'method' => 'post','class'=>'form-horizontal'))}}
<div class="control-group">
    {{ Form::label('item', 'Nombre', array('class' => 'control-label'))}}
    <div class="controls">
        {{ Form::input('text','nombre')}}
    </div>
</div>
<div class="control-group">
    {{ Form::label('url', 'URL', array('class' => 'control-label'))}}
    <div class="controls">
        {{ Form::input('text','url')}}
    </div>
</div>
<div class="control-group">
    <div class="controls">
        {{ Form::submit('Guardar', array('class' => 'btn'));}}
    </div>
</div>
{{ Form::close();}}
@stop