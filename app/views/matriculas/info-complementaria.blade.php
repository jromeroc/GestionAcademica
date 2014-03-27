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

    @if(!empty($papa))
      <input type="hidden" name="papa" id="papa" class="form-control" value="{{$papa}}">
    @endif




  <!-- Submit !-->
  <div class="form-group col-sm-12">
    {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
  </div>
  {{Form::close()}}
  </div>

    <!-- MAMA -->
  <div class="tab-pane fade" id="mama">
      <br>
    {{ Form::open(array('url' => 'matriculas/savePadre', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
    
    <!-- Nombre mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('nameP', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('nameP',$mama['nombres_padre'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('nameP',null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>
    </div>
    @if(isset($mama))
    <input type="hidden" name="datosm" id="datosm" class="form-control" value="{{$mama['id_padre']}}">
    @endif
    <!-- Ape1 mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('fnameP', 'Primer Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('fnameP', $mama['apel1_padre'], array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fnameP', null, array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>
    
    <!-- Ape2 mama -->
    <div class="form-group col-sm-12">
      {{ Form::label('lnameP', 'Segundo Apellido', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
          {{ Form::Text('lnameP', $mama['apel2_padre'], array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
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
          @if(isset($mama))
          {{ Form::select('tipo_docP', $tipodoc, $mama['id_tipodoc_padre'])}}
          @else
          {{ Form::select('tipo_docP', $tipodoc, null)}}
          @endif
        </div>
      </div>

    <!-- Numero Doc -->
    <div class="form-group col-sm-12">
      {{ Form::label('Num_docP', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
          @if(isset($mama))
          {{ Form::Text('Num_docP', $mama['numdoc_padre'], array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('Num_docP', null, array('placeholder' => 'Numero Identidad', 'class' => 'col-sm-2 form-control')) }}
          @endif
      </div>  
    </div>

    <!-- Profesion -->
    <div class="form-group col-sm-12">
      {{ Form::label('profP', 'Profesion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('profP', $mama['profesion_padre'], array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('profP', null, array('placeholder' => 'Profesion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Ocupacion -->
    <div class="form-group col-sm-12">
      {{ Form::label('ocP', 'Ocupacion', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('ocP', $mama['ocupacion_padre'] , array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('ocP', null, array('placeholder' => 'Ocupacion ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Empresa -->
    <div class="form-group col-sm-12">
      {{ Form::label('empP', 'Empresa', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('empP', $mama['empresa_padre'], array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('empP', null, array('placeholder' => 'Empresa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tel Fijo -->
    <div class="form-group col-sm-12">
        {{ Form::label('fijoP', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('fijoP', $mama['tel_casa_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('fijoP', null, array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Tel Oficina -->
    <div class="form-group col-sm-12">
        {{ Form::label('TofP', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('TofP', $mama['tel_oficina_padre'] , array('placeholder' => 'Telefono Casa ', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('TofP', null, array('placeholder' => 'Telefono Oficina ', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- Celular -->
    <div class="form-group col-sm-12">
      {{ Form::label('celP', 'Celular', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('celP', $mama['celular_padre'], array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @else
        {{ Form::Text('celP', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
        @endif
      </div>  
    </div>

    <!-- E-Mail -->
    <div class="form-group col-sm-12">
      {{ Form::label('emailP', 'Correo Electronico', array('class' => 'col-sm-2 control-label')) }}
      <div class="col-sm-2">
        @if(isset($mama))
        {{ Form::Text('emailP', $mama['email_padre'], array('placeholder' => 'Email', 'class' => 'col-sm-2 form-control')) }}
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

    <input type="hidden" name="genero" id="genero" class="form-control" value="0">

    @if(!empty($mama))
      <input type="hidden" name="mama" id="mama" class="form-control" value="{{$mama}}">
    @endif

    @if(!empty($tipoR))
      <input type="hidden" name="T-Reg" id="T-Reg" class="form-control" value="{{$tipoR}}">
    @endif
  <!-- Submit !-->
  <div class="form-group col-sm-12">
    {{form::submit('Guardar información',array('class'=>'btn btn-success col-sm-6'))}}
  </div>
  {{Form::close()}}
  </div>

    <!-- ACUDIENTE -->

  <div class="tab-pane fade" id="acudiente">
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
  </div>

    {{Form::close()}}


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