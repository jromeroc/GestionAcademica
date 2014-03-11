@extends('layouts.master')


@section('title')
@parent
.:: Observaciones ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Nueva Matricula</small></h1>
@stop
@section('content')

	{{-- Errores --}}
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
	{{-- Formulario --}}

  	{{ Form::open(array('url' => 'matriculas/nuevo', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
  		
      	<!-- Año Matricula  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      		{{ Form::select('year_matricula', array($años['year'] => '2013-2014',$años['lastY'] => '2012-2013',$años['nextY'] => '2014-2015')); }}
      	</div>
      </div>

  		<div class="form-group col-sm-12">
      	{{ Form::label('tipo_reg', 'Tipo de Registro', array('class' => 'col-sm-2 control-label')) }}
        
        <!-- Inscripcion  !-->
        <div class="col-sm-1">
          <div class="radio">
            <label>
              <input type="radio" id="Inscripcion" name="T-reg" value="1">
              Inscripcion
            </label>
          </div>
        </div>

      	<!-- Matricula  !-->
        <div class="col-sm-1">
          <div class="radio">
            <label>
              <input type="radio" id="Matricula" name="T-reg" value="1">
              Matricula
            </label>
          </div>
        </div>

      <!-- Fecha  !-->
  		<div class="form-group col-sm-12">

      	{{ Form::label('fecha_matricula', 'Fecha matricula', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
      		{{ Form::Text('fecha_matricula', null, array('placeholder' => 'Fecha Matricula', 'class' => 'col-sm-2 form-control')) }}
       	</div>
      </div>
      	
      <!-- Grado  !-->
      <div class="form-group col-sm-12">
          {{ Form::label('grado', 'Grado', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-3">
            {{{ $errors->has('grado') ? '**' : '' }}}
            {{ Form::select('grado', $grado, null)}}

          </div>
			
		  </div>

		  <!-- Nombre  !-->
  		<div class="form-group col-sm-12">
    		{{ Form::label('alum', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      		{{ Form::Text('alum', null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>
      {{ Form::hidden('id_alum',null, array('id' => 'id_alum')) }}
      
      <!-- Apellido 1  !-->
  		<div class="form-group col-sm-12">
     		{{ Form::label('fnane', 'Primer apellido', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
     			{{ Form::Text('fnane', null, array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
       	</div>
      </div>

      <!-- Apellido 2  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('lnane', 'Segundo apellido', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      			{{ Form::Text('lnane', null, array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Tipo Documento  !-->
  		<div class="form-group col-sm-12">
        {{ Form::label('tipo_doc', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{{ $errors->has('tipos') ? '**' : '' }}}
          {{ Form::select('tipos', $tipodoc, null)}}
        </div>
      </div>

      <!-- Numero Documento  !-->
  		<div class="form-group col-sm-12">
        {{ Form::label('n_document', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
        	{{ Form::Text('n_document', null, array('placeholder' => 'Numero de identidad', 'class' => 'col-sm-2 form-control')) }}
      	</div>
      </div>

      <!-- Pais Nacimiento  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('pais_srch', 'Pais de nacimiento', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
      		{{ Form::Text('pais_srch', null, array('placeholder' => 'Pais Nacimiento', 'class' => 'col-sm-2 form-control')) }}
      	</div>
      </div>
      {{ Form::hidden('id_pais',null, array('id' => 'id_pais')) }}

        <!-- Ciudad Nacimiento  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('city_srch', 'Ciudad de nacimiento', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('city_srch', null, array('placeholder' => 'Ciudad Nacimiento', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Genero  !-->

        <div class="form-group col-sm-12">
      		{{ Form::label('Sexo', 'Sexo', array('class' => 'col-sm-2 control-label')) }}
      		
      		<!-- Masculino  !-->
  			<div class="col-sm-1">
  				<div class="radio">
  					<label>
  						<input type="radio" name="genero" value="Hombre">
  						M
  					</label>
  				</div>
      		</div>

      		<!-- Femenino  !-->
  			<div class="col-sm-1">
  				<div class="radio">
  					<label>
  						<input type="radio" name="genero" value="Mujer">
  						F
  					</label>
  				</div>
      		</div>

      	</div>

      	<!-- Grupo Sanguineo  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('g_sang', 'Grupo Sanguineo', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('g_sang', null, array('placeholder' => 'Grupo Sanguineo', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- RH  !-->

        <div class="form-group col-sm-12">
      		{{ Form::label('RH', 'RH', array('class' => 'col-sm-2 control-label')) }}
      		
      		<!-- Positivo  !-->
  			<div class="col-sm-1">
  				<div class="radio">
  					<label>
  						<input type="radio" name="RH" value="Hombre">
  						+
  					</label>
  				</div>
      		</div>

      		<!-- Negativo  !-->
  			<div class="col-sm-1">
  				<div class="radio">
  					<label>
  						<input type="radio" name="RH" value="Mujer">
  						-
  					</label>
  				</div>
      		</div>

      	</div>

      	<!-- EPS  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('eps', 'Eps', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('eps', null, array('placeholder' => 'Eps', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Tipo de hermano  !-->
        <div class="form-group col-sm-12">
      		{{ Form::label('t_hermano', 'Tipo de hermano', array('class' => 'col-sm-2 control-label')) }}
      	</div>

        <div class="form-group col-sm-6">
      		<!-- No tiene  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" value="0">
  						No aplica
  					</label>
  				</div>
      		</div>

      		<!-- Mayor  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" value="1">
  						Mayor
  					</label>
  				</div>
      		</div>

      		<!-- Menor  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" value="1">
  						Mayor
  					</label>
  				</div>
      		</div>

      	</div>
      		
      	<!-- Direccion de residencia  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('direcc', 'Direccion de Residencia', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('direcc', null, array('placeholder' => 'Direccion de Residencia', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Fijo  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('fijo', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('fijo', null, array('placeholder' => 'Telefono', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Celular  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('cel', 'Celular', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('cel', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Email  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::email('email', null, array('placeholder' => 'E-Mail', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>

        <!-- Submit !-->
        <div class="form-group col-sm-12">
        	<div class="col-sm-6">
        		{{form::submit('Guardar Matricula',array('class'=>'btn btn-success col-sm-4'))}}
      		</div>
        </div>

        {{ Form::hidden('papa',null, array('id' => 'papa')) }}
        {{ Form::hidden('mama',null, array('id' => 'mama')) }}
        {{ Form::hidden('acudiente',null, array('id' => 'acudiente')) }}
    {{Form::close()}}


@stop

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop