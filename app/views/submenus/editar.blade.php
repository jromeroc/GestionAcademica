@extends('layouts.master')

@section('title')
.::Editar Submenu::.
@parent
@stop

@section('modulo')
<h1>Editar Submenú</h1>
@stop

@section('content')



{{ Form::open(array('url'=>'submenu/save', 'method' => 'post','class'=>'form-horizontal'))}}
 {{ Form::hidden('id', $info['id']) }}
<div class="control-group">
    {{ Form::label('item', 'Nombre del Submenu', array('class' => 'control-label'))}}
    <div class="controls">
        {{ Form::input('text','nombre',$info['name_item'])}}
    </div>
</div>
<div class="control-group">
    {{ Form::label('url', 'URL', array('class' => 'control-label'))}}
    <div class="controls">
        {{ Form::input('text','url',$info['url'])}}
    </div>
</div>
<div class="control-group">
    {{Form::label('estado', 'Estado', array('class' => 'control-label'))}}
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