@extends('layouts.master')

@section('title')
@parent
.:: Login ::.
@stop

@section('modulo')
    <h2>Inicia sesión</h2>
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
        {{ Form::label('username', 'Usuario', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::input('text', 'username', '', array('placeholder'=>'Usuario'))}}
            {{ $errors->first('username') }}
        </div>
    </div>

     <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Contraseña', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::input('password', 'password', '', array('placeholder'=>'Contraseña'))}}
            {{ $errors->first('password') }}
        </div>
    </div>

    <!-- Login button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Iniciar sesión', array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}
@stop

<div>

</div>




