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

            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <h3 class="panel-title"><strong>Alumno:</strong> {{$name}}</h3>      
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h3 class="panel-title"><strong>Codigo Matricula:</strong> {{$codM}} </h3>
            </div>

          </div>
          <br>
        </div>
    @elseif($tipoR == 0)
        <div class="alert alert-success">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3 class="panel-title"><strong>Alumno:</strong> {{$name}}</h3>      
            </div>    

            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <h3 class="panel-title"><strong> Tipo: </strong> Inscripción</h3>
            </div>

          </div>
          <br>
        </div>
    @endif

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
  
  @if(!empty($id_alum))
    {{ HTML::link('matriculas/padre/'.$id_alum.'/'.$year.'/', 'Papá', array('class'=>'nav nav-tabs col-sm-3'));}}
    {{ HTML::link('matriculas/madre/'.$id_alum.'/'.$year.'/', 'Mamá', array('class'=>'nav nav-tabs col-sm-3'));}}
    {{ HTML::link('matriculas/acudiente/'.$id_alum.'/'.$year.'/', 'Acudiente', array('class'=>'nav nav-tabs col-sm-3'));}}
    {{ HTML::link('matriculas/correspondencia', 'Correspondencia', array('class'=>'nav nav-tabs col-sm-3'));}}
  @endif
  
  </div>
</div>

  <br>
  <br>
  <br>

<div id="message-success" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    @if(isset($save))
      @if(!empty($save))
        @if($action=="Guardado")
        <div class="alert alert-success">
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3 class="panel-title"><strong>{{$save}}</strong></h3>      
              </div>    
            </div>
            <br>
          </div>
          
          @elseif($action=="Actualizado")
            <div class="alert alert-info">
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <h3 class="panel-title"><strong>{{$save}}</strong></h3>      
              </div>    
            </div>
            <br>
          </div>
          @endif
      @endif
    @endif

</div>

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop

@stop