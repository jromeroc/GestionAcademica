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
    <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
        {{ Form::label('username', 'Usuario', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
            {{ Form::input('text', 'username', '', array('class'=>'form-control','placeholder'=>'Usuario'))}}
            {{ $errors->first('username') }}
        </div>
    </div>

     <!-- Password -->
    <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
            {{ Form::input('password', 'password', '', array('class'=>'form-control','placeholder'=>'Contraseña'))}}
            {{ $errors->first('password') }}
        </div>
    </div>

    <!-- Login button -->
    <div class="form-group">
         <div class="col-sm-offset-2 col-sm-3">
            {{ Form::submit('Iniciar sesión', array('class' => 'btn btn-success')) }}
        </div>
    </div>

{{ Form::close() }}
@stop

<div>

</div>