@extends('layouts.master')

@section('title')
.::Nuevo Submenu::.
@parent
@stop

@section('modulo')
<h1>Crear Submenú</h1>
@stop
@section('content')

{{ Form::open(array('url'=>'submenu/guardar', 'method' => 'post','class'=>'form-horizontal'))}}
<div class="control-group">
    {{ Form::label('menu', 'Nombre del Menú a que pertenece', array('class' => 'control-label'))}}
    <div class="controls">
        {{ Form::select('menu',$menus,'')}}
    </div>
</div>
<div class="control-group">
    {{ Form::label('item', 'Nombre del Submenu', array('class' => 'control-label'))}}
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