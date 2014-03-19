@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Informacion Adicional</small></h1>
@stop
@section('content')

  <div class="panel panel-info">
    @if($matricula)
      <div class="panel-heading">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
          <h3 class="panel-title"> Alumno: <strong>{{$name}}</strong>
        </div>        
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
          <h3 class="panel-title">Codigo Matricula: {{$matricula}} </strong>
        </div>
      </div>
@else
    <div class="panel-heading">
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h3 class="panel-title"> Alumno: <strong>{{$name}}</strong>
      </div>        
      <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        <h3 class="panel-title">Inscripcion</strong>
      </div>
    </div>
@endif
  </div>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#papa" data-toggle="tab">Papá</a></li>
  <li><a href="#mama" data-toggle="tab">Mamá</a></li>
  <li><a href="#acudiente" data-toggle="tab">Acudiente</a></li>
  <li><a href="#correspondencia" data-toggle="tab">Correspondencia</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="papa">
  	Datos Papa
  </div>
  <div class="tab-pane fade" id="mama">
  	Mama
  </div>
  <div class="tab-pane fade" id="acudiente">
  	Acudiente
  </div>
  <div class="tab-pane fade" id="correspondencia">
  	Correspondencia
  </div>
</div>
@stop