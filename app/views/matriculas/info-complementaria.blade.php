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
              <h3 class="panel-title">Inscripción </strong></h3>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <h3 class="panel-title"><strong>Alumno:</strong> {{$name}}</h3>      
            </div>    
          </div>
          <br>
        </div>
    @endif

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#papa" data-toggle="tab">Información Papá</a></li>
  <li><a href="#mama" data-toggle="tab">Información Mamá</a></li>
  <li><a href="#acudiente" data-toggle="tab">Información Acudiente</a></li>
  <li><a href="#correspondencia" data-toggle="tab">Correspondencia</a></li>
</ul>

<!-- Informacion Complementaria -->
<div class="tab-content">

    <!-- PAPA -->
  <div class="tab-pane fade in active" id="papa">
  <br>
    {{ Form::open(array('url' => 'matriculas/saveP', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
    
    <!-- Nombre papa -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameP', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($papa)
        {{ Form::Text('nameP',$papa['nombres_padre'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('nameP',null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>
    </div>
    <input type="hidden" name="datosp" id="datosp" class="form-control" value="{{$papa}}">
    
    <!-- Ape1 papa -->
    <div class="form-group col-sm-12">
      {{ Form::label('fnameP', 'Primer Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($papa)
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
        @if($papa)
          {{ Form::Text('lnameP', $papa['apel2_padre'], array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
          {{ Form::Text('lnameP', null, array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tipo Documento  !-->
      <div class="form-group col-sm-12">
        {{ Form::label('tipo_doc', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{{ $errors->has('tipo_doc') ? '**' : '' }}}
          @if($papa)
          {{ Form::select('tipo_doc', $tipodoc, $papa['id_tipodoc_padre'])}}
          @else
          {{ Form::select('tipo_doc', $tipodoc, null)}}
          @endif
        </div>
      </div>

    <!-- Numero Doc -->
    <div class="form-group col-sm-12">
      {{ Form::label('Num_docP', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
          @if($papa)
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
        @if($papa)
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
        @if($papa)
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
        @if($papa)
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
        @if($papa)
        {{ Form::Text('fijoP', $papa['tel_casa_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fijoP', null, array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Celular -->
    <div class="form-group col-sm-12">
      {{ Form::label('celP', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($papa)
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
        @if($papa)
        {{ Form::Text('emailP', null, array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('emailP', null, array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

  <!-- Submit !-->
  <div class="form-group col-sm-12">
    {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
  </div>
  {{Form::close()}}
  </div>




    <!-- MAMA -->
  <div class="tab-pane fade" id="mama">
      <br>

    {{ Form::open(array('url' => 'matriculas/saveM', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
    
    <!-- Nombre mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameM', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('nameM',$mama['nombres_padre'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('nameM',null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>
    </div>
    <input type="hidden" name="datosm" id="datosm" class="form-control" value="{{$mama}}">
    
    <!-- Ape1 mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('fnameM', 'Primer Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('fnameM', $mama['apel1_padre'], array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fnameM', null, array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>
    
    <!-- Ape2 mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('lnameM', 'Segundo Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
          {{ Form::Text('lnameM', $mama['apel2_padre'], array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
          {{ Form::Text('lnameM', null, array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tipo Documento  !-->
      <div class="form-group col-sm-12">
        {{ Form::label('tipo_doc', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{{ $errors->has('tipo_doc') ? '**' : '' }}}
          @if($papa)
          {{ Form::select('tipo_doc', $tipodoc, $mama['id_tipodoc_padre'])}}
          @else
          {{ Form::select('tipo_doc', $tipodoc, null)}}
          @endif
        </div>
      </div>


    <!-- Numero Doc -->
    <div class="form-group col-sm-12">
      {{ Form::label('Num_docM', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
          @if($mama)
          {{ Form::Text('Num_docM', $mama['numdoc_padre'], array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('Num_docM', null, array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @endif
      </div>  
    </div>

    <!-- Profesion -->
    <div class="form-group col-sm-12">
      {{ Form::label('profM', 'Profesion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('profM', $mama['profesion_padre'], array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('profM', null, array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Ocupacion -->
    <div class="form-group col-sm-12">
      {{ Form::label('ocM', 'Ocupacion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('ocM', $mama['ocupacion_padre'] , array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('ocM', null, array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Empresa -->
    <div class="form-group col-sm-12">
      {{ Form::label('empM', 'Empresa', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('empM', $mama['empresa_padre'], array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('empM', null, array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tel Fijo -->
    <div class="form-group col-sm-12">
        {{ Form::label('fijoM', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('fijoM', $mama['tel_casa_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fijoM', null, array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Celular -->
    <div class="form-group col-sm-12">
      {{ Form::label('celM', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($mama)
        {{ Form::Text('celM', $mama['celular_padre'], array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('celM', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <div class="form-group col-sm-12">
      {{ Form::label('emailM', 'Correo Electronico', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if($papa)
        {{ Form::Text('emailM', $mama['email_padre'], array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('emailM', null, array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Submit !-->
    <div class="form-group col-sm-12">
      {{form::submit('Guardar información Mamá',array('class'=>'btn btn-success col-sm-6'))}}
    </div>
    

    {{Form::close()}}
  </div>



    <!-- ACUDIENTE -->
    {{ Form::open(array('url' => 'matriculas/saveM', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}

  <div class="tab-pane fade" id="acudiente">
  <br>
    <!-- Nombre Acudiente -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameA', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        {{ Form::Text('nameA', null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
      </div>  
    </div>
    
    <!-- Parentesco   -->
    <div class="form-group col-sm-12">
      {{ Form::label('ParentA', 'Parentesco', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        {{ Form::Text('ParentA', null, array('placeholder' => 'Parentesco', 'class' => 'col-sm-2 form-control')) }}
      </div>  
    </div>

    <!-- Telefono   -->
    <div class="form-group col-sm-12">
      {{ Form::label('telA', 'Telefono Fijo', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        {{ Form::Text('telA', null, array('placeholder' => 'Telefono Fijo', 'class' => 'col-sm-2 form-control')) }}
      </div>  
    </div>
    
    <!-- Celular   -->
    <div class="form-group col-sm-12">
      {{ Form::label('celA', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        {{ Form::Text('celA', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
      </div>  
    </div>

    <!-- Telefono Oficina  -->
    <div class="form-group col-sm-12">
      {{ Form::label('telOfA', 'Telefono Oficina', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        {{ Form::Text('telOfA', null, array('placeholder' => 'Telefono Oficina', 'class' => 'col-sm-2 form-control')) }}
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
  </div>

    {{Form::close()}}


</div>


@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop

@stop