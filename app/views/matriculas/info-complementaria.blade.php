@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Informacion Adicional</small></h1>
@stop

@section('content')
    @if($tipoR == 1)
        <div class="alert alert-info">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h3 class="panel-title"><strong>Codigo Matricula:</strong> {{$codM}} </h3>
            </div>

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <h3 class="panel-title"><strong>Alumno:</strong> {{$name}}</h3>      
            </div>    
          </div>
          <br>
        </div>
    @elseif($tipoR == 0)
        <div class="alert alert-success">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h3 class="panel-title"><strong> Inscripción </strong></h3>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3 class="panel-title"><strong>Alumno:</strong> {{$name}}</h3>      
            </div>    
          </div>
          <br>
        </div>
    @endif

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
  
  </div>

  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    {{ HTML::link('matriculas/padres/'.$id_alum.'/'.$year.'/'.$tipoP, 'Papá', array('class'=>'btn btn-info col-sm-3'));}}
    {{ HTML::link('matriculas/padres/'.$id_alum.'/'.$year.'/'.$tipoP, 'Mamá', array('class'=>'btn btn-info col-sm-3'));}}
    {{ HTML::link('matriculas/acudiente', 'Acudiente', array('class'=>'btn btn-info col-sm-3'));}}
    {{ HTML::link('matriculas/correspondencia', 'Correspondencia', array('class'=>'btn btn-info col-sm-3'));}}

  </div>

  <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

  </div>

</div>


@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop

@stop