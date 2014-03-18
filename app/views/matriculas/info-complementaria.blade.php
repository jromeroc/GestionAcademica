@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Informacion Adicional</small></h1>
@stop
@section('content')
<span class="label">Alumno: {{$datos['names']}}</span>
{{--@if ( datos[''] )--}}

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
  	Papa
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