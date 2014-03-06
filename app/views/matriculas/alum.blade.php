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

  	{{ Form::model(array('url' => 'matriculas/nueva', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
  		
      	<!-- Año Matricula  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('Año Matricula', 'Año Matricula', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-3">
      			<select name="año Matricula" id="año_matricula" class="form-control">
      				<option value="NULL">Seleccione un año</option>
      			</select>
      		</div>
        </div>

  		<div class="form-group col-sm-12">
      		
      		<!-- Inscripcion  !-->
  			<div class="col-sm-3">
  				<div class="checkbox">
  					<label>
  						<input type="checkbox" value="">
  						Inscripcion
  					</label>
  				</div>
      		</div>

      		<!-- Matricula  !-->
  			<div class="col-sm-3">
  				<div class="checkbox">
  					<label>
  						<input type="checkbox" value="">
  						Matricula
  					</label>
  				</div>
      		</div>

      	</div>

      	<!-- Fecha  !-->
  		<div class="form-group col-sm-12">

      		{{ Form::label('fecha_Matricula', 'Fecha matricula', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('fecha_matricula', null, array('placeholder' => 'Fecha Matricula', 'class' => 'col-sm-2 form-control')) }}
        	</div>
        </div>
      	
      	<!-- Grado  !-->
        <div class="form-group col-sm-12">
			
		</div>

		<!-- Nombre  !-->
  		<div class="form-group col-sm-12">

      		{{ Form::label('nombre_alum', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('nombre_alum', null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
        	</div>
        </div>

        <!-- Apellido 1  !-->
  		<div class="form-group col-sm-12">

      		{{ Form::label('fname', 'Primer apellido', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('fnane', null, array('placeholder' => 'Apellido 1', 'class' => 'col-sm-2 form-control')) }}
        	</div>
        </div>

        <!-- Apellido 2  !-->
  		<div class="form-group col-sm-12">

      		{{ Form::label('lname', 'Segundo apellido', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('lnane', null, array('placeholder' => 'Apellido 2', 'class' => 'col-sm-2 form-control')) }}
        	</div>
        </div>

        <!-- Tipo Documento  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('tipo_doc', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-3">
      			<select name="tipo_doc" id="tipo_doc" class="form-control">
      				<option value="NULL">Seleccione Tipo documento</option>
      			</select>
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
      		{{ Form::label('P_nac', 'Pais de nacimiento', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
      			{{ Form::Text('p__nac', null, array('placeholder' => 'Pais Nacimiento', 'class' => 'col-sm-2 form-control')) }}
      		</div>
        </div>
  	{{Form::close()}}
@stop