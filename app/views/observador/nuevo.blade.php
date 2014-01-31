@extends('layouts.master')

@section('title')
@parent
.:: Observador ::.
@stop

<style>
  #row1{
    margin:5px;
    padding:5px;
    float:left;
    border: dashed gray;
    background-color: #57ADEE;
  }
  #list_grado{
    margin:5px;
    padding:5px;
    float:right;
    border:solid #111;
    background-color: #12B127;
  }
  .c{
    text-align: center;
    color: darkblue;
  }
</style>

@section('modulo')
  <h1>Observaciones <small>Nueva Observación</small></h1>
@stop

@section ('content')

<h1 class="c"><i>Crear Observación<i></h1>

  <div class="row" id="row1">

    {{ Form::model(array('route' => 'observador.save', 'method' => 'POST', 'files'=>'true'), array('role' => 'form')) }}

    <!-- -/Fecha/-  !-->

    <div class="form-group col-md-4">
      {{ Form::label('fecha', 'Fecha Observacion') }}
      {{ Form::text('fecha', null, array('placeholder' => 'Fecha de Observacion', 'class' => 'form-control')) }}
    </div>

    <!-- -/Id Docente/-  !-->

    <div class="form-group col-md-4">
      {{ Form::label('id_profesor', 'Id Docente') }}
      {{ Form::text('id_profesor', null, array('placeholder' => 'Id Docente', 'class' => 'form-control')) }}
    </div>

    <!-- -/Seleccionar Alumnos/-  !-->
    
    <button type="button" class="btn btn-primary">Seleccionar Alumnos</button>

    <div class="form-group col-md-4">
      {{ Form::label('Descrip', 'Descripcion') }}
      {{ Form::textarea('Descrip', null, array('placeholder' => 'Descripcion', 'class' => 'form-control')) }}        
    </div>

    <!-- -/Archivo/-  !-->

    <div class="form-group col-md-4">
      {{ Form::label('Prueba', 'Pruebas') }}
      {{ Form::File('Prueba', null, array('class' => 'form-control')) }}        
    </div>
    <br>

    <!-- -/Guardar/-  !-->

  {{ Form::button('Crear Observación', array('type' => 'submit', 'class' => 'btn btn-primary')) }}
  </div>

  <!-- -/Lista de Alumnos/-  !-->

  <div class="row" id="list_grado">
  </div>
  
{{ Form::close() }}

@stop