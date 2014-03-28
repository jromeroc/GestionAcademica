@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Papá / Mamá</small></h1>
@stop

@section('content')


<!-- PAPA -->
  <div>
  <br>
    {{ Form::open(array('url' => 'matriculas/savePadre', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
    
    <!-- Nombre papa -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameP', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('nameP',$papa['nombres_padre'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('nameP',null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>
    </div>
    @if(!empty($papa))
    <input type="hidden" name="datosp" id="datosp" class="form-control" value="{{$papa['id_padre']}}">
    @endif
    <!-- Ape1 papa -->
    <div class="form-group col-sm-12">
      {{ Form::label('fnameP', 'Primer Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('fnameP', $papa['apel1_padre'], array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fnameP', null, array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>
    
    <!-- Ape2 papa -->
    <div class="form-group col-sm-12">
      {{ Form::label('lnameP', 'Segundo Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
          {{ Form::Text('lnameP', $papa['apel2_padre'], array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
          {{ Form::Text('lnameP', null, array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tipo Documento  !-->
      <div class="form-group col-sm-12">
        {{ Form::label('tipo_docP', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{{ $errors->has('tipo_docP') ? '**' : '' }}}
          @if(!empty($papa))
          {{ Form::select('tipo_docP', $tipodoc, $papa['id_tipodoc_padre'])}}
          @else
          {{ Form::select('tipo_docP', $tipodoc, null)}}
          @endif
        </div>
      </div>

    <!-- Numero Doc -->
    <div class="form-group col-sm-12">
      {{ Form::label('Num_docP', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
          @if(!empty($papa))
          {{ Form::Text('Num_docP', $papa['numdoc_padre'], array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('Num_docP', null, array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @endif
      </div>  
    </div>

    <!-- Profesion -->
    <div class="form-group col-sm-12">
      {{ Form::label('profP', 'Profesion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('profP', $papa['profesion_padre'], array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('profP', null, array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Ocupacion -->
    <div class="form-group col-sm-12">
      {{ Form::label('ocP', 'Ocupacion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('ocP', $papa['ocupacion_padre'] , array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('ocP', null, array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Empresa -->
    <div class="form-group col-sm-12">
      {{ Form::label('empP', 'Empresa', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('empP', $papa['empresa_padre'], array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('empP', null, array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tel Fijo -->
    <div class="form-group col-sm-12">
        {{ Form::label('fijoP', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('fijoP', $papa['tel_casa_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fijoP', null, array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tel Oficina -->
    <div class="form-group col-sm-12">
        {{ Form::label('TofP', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('TofP', $papa['tel_oficina_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('TofP', null, array('placeholder' => 'Telefono Oficina ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Celular -->
    <div class="form-group col-sm-12">
      {{ Form::label('celP', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('celP', $papa['celular_padre'], array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('celP', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- E-Mail -->
    <div class="form-group col-sm-12">
      {{ Form::label('emailP', 'Correo Electronico', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(!empty($papa))
        {{ Form::Text('emailP', $papa['email_padre'], array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('emailP', null, array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>


    @if(!empty($codM))
      <input type="hidden" name="codM" id="codM" class="form-control" value="{{$codM}}">
    @endif

    @if(!empty($name))
      <input type="hidden" name="alum" id="alum" class="form-control" value="{{$name}}">
    @endif

    @if(isset($tipoR))
      <input type="hidden" name="T-Reg" id="T-Reg" class="form-control" value="{{$tipoR}}">
    @endif
    
    <input type="hidden" name="genero" id="genero" class="form-control" value="1">

  <!-- Submit !-->
  <div class="form-group col-sm-12">
    {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
  </div>
  {{Form::close()}}
  </div>

@section('scripts')
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop

@stop