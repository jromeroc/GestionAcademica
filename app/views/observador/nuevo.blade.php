@extends('layouts.master')

@section('title')
@parent
.:: Observador ::.
@stop


@section('modulo')
  <h1>Observaciones <small>Nueva Observación</small></h1>
@stop

@section ('content')
  @if ($errors->any())
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
     
  {{ Form::model($observador, array('url' => 'observador/nuevo', 'method' => 'POST','class'=>'form-horizontal'), array('role'=>'form'))}}
      <!-- Fecha  !-->
      <div class="form-group">
      {{ Form::label('Fecha', 'Fecha', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::Text('Fecha', null, array('placeholder' => 'Fecha Observacion', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Docente  !-->
      <div class="form-group">
      {{ Form::label('docente', 'Docente',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::Text('docente', null, array('placeholder' => 'Id del Docente', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Select grupo  !-->
        <div class="form-group">
          {{ Form::label('grupo', 'Grado', array('class' => 'col-sm-2 control-label'))}}
          <div class="col-sm-2">
            {{{ $errors->has('grupo') ? '**' : '' }}}
            {{ Form::select('grupo', $grupos, '')}}
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-2">
            {{form::button('Seleccionar Alumno',array('class'=>'col-sm-3 btn btn-info'))}}
          </div>
        </div>

            
         <div class="form-group">
          <div class="col-sm-2">
          {{form::submit('Crear Observacion',array('class'=>'btn btn-success'))}}
          {{form::button('Regresar',array('class'=>'btn btn-info'))}}
          </div>
        </div>
{{ Form::close() }}
@stop