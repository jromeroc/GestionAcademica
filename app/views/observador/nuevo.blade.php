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

  {{ Form::model($observador, array('url' => 'observador/nuevo', 'method' => 'POST','class'=>'form-horizontal col-sm -6'), array('role'=>'form'))}}
      <!-- Fecha  !-->
      <div class="form-group">
      {{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::Text('fecha', null, array('placeholder' => 'Fecha Observacion', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Docente  !-->
      <div class="form-group">
      {{ Form::label('id_docente', 'Docente',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::Text('id_docente', null, array('placeholder' => 'Id del Docente', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <div class="form-group">
      {{ Form::label('descripcion', 'Descripcion',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripcion de la Observacion', 'class' => 'col-sm-2 form-control')) }}
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
        <!-- Select alumno  !-->
        <div class="form-group">
            
          <div class="col-sm-offset-2 col-sm-4">
            {{form::button('Seleccionar Alumnos',array('id'=>'btn-alumn-srch','class'=>'col-sm-6 btn btn-info'))}}
          </div>
        </div>
        <!-- Guardar-Volver  !-->    
        <div class="form-group">
          
          <div class="col-sm-offset-2 col-sm-3">
            {{form::submit('Guardar',array('class'=>'btn btn-success'))}}           
          </div>
        </div>
{{ Form::close() }}
@stop

@section('scripts')
  {{HTML::script('js/scripts/observador.js')}}
@stop