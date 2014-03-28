@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Acudiente</small></h1>
@stop

@section('content')

<!-- ACUDIENTE -->
    {{ Form::open(array('url' => 'matriculas/saveM', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
    <br>
    <!-- Nombre Acudiente -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameA', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
      @if(isset($acudiente))
        {{ Form::Text('nameA',$acudiente['nombre_acudiente'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
      @else
        {{ Form::Text('nameA',null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
      @endif
      </div>
    </div>
    @if(isset($acudiente))
    <input type="hidden" name="datosA" id="datosA" class="form-control" value="{{$acudiente['id_acudiente']}}">
    @endif
    <!-- Parentesco -->
    <div class="form-group col-sm-12">
      {{ Form::label('ParentA', 'Parentesco', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
      @if(isset($acudiente))
        {{ Form::Text('ParentA', $acudiente['parentesco_acudiente'], array('placeholder' => 'Parentesco', 'class' => 'col-sm-2 form-control')) }}
      @else
        {{ Form::Text('ParentA', null, array('placeholder' => 'Parentesco', 'class' => 'col-sm-2 form-control')) }}
      @endif
      </div>
    </div>

    <!-- Telefono -->
    <div class="form-group col-sm-12">
      {{ Form::label('telA', 'Telefono Fijo', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
      @if(isset($acudiente))
        {{ Form::Text('telA', $acudiente['telefono_acudiente'], array('placeholder' => 'Telefono Fijo', 'class' => 'col-sm-2 form-control')) }}
      @else  
        {{ Form::Text('telA', null, array('placeholder' => 'Telefono Fijo', 'class' => 'col-sm-2 form-control')) }}
      @endif
      </div>
    </div>
    
    <!-- Celular -->
    <div class="form-group col-sm-12">
      {{ Form::label('celA', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
      @if(isset($acudiente))
        {{ Form::Text('celA',$acudiente['celular_acudiente'], array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
      @else  
        {{ Form::Text('celA', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
      @endif
      </div>
    </div>

    <!-- Telefono Oficina -->
    <div class="form-group col-sm-12">
      {{ Form::label('telOfA', 'Telefono Oficina', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
      @if(isset($acudiente))
        {{ Form::Text('telOfA', $acudiente['teloficina_acudiente'], array('placeholder' => 'Telefono Oficina', 'class' => 'col-sm-2 form-control')) }}
      @else  
        {{ Form::Text('telOfA', null, array('placeholder' => 'Telefono Oficina', 'class' => 'col-sm-2 form-control')) }}
      @endif
      </div>
    </div>

    <!-- Submit !-->
    <div class="form-group col-sm-12">
      {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
    </div>


  </div>


  <div class="tab-pane fade" id="correspondencia">
    
    <!-- Submit !-->
    <div class="form-group col-sm-12">
      {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
    </div>

    {{Form::close()}}



@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop

@stop