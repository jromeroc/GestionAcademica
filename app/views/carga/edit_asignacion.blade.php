@extends('layouts.master')

@section('title')
@parent
.:: Logros ::.
@stop

@section('modulo')
	<h1>Carga Académica <small>Asignación</small></h1>
@stop

@section('content')

@if($errors->any())
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

	{{ Form::model($infoCarga, array('url' => 'carga_academica/asignar/'.$infoCarga->carga,'class'=>'form-horizontal col-sm -6'), array('role'=>'form'))}}

		
		<div class="form-group">
      		{{ Form::label('docente_srch', 'Docente',array('class' => 'col-sm-2 control-label')) }}
	        <div class="col-sm-2">
	          {{ Form::hidden('id_docente', Input::old('id_docente'), array('id' => 'id_docente')) }}
	          {{ Form::Text('docente_srch', null, array('placeholder' => 'Docente', 'class' => 'col-sm-2 form-control')) }}
	        </div>
      	</div>
			{{{ $errors->has('listperiodo') ? '**' : '' }}}
		 	@foreach ($listperiodo as $indice => $periodo)
	     	 	<div class="form-group">
		        	<div class="col-sm-offset-2 col-sm-2">
						{{Form::checkbox('periodo[]', $indice)}}
						<label>{{$periodo}} Periodo</label>
					</div>
				</div>
		 	@endforeach
		<div class="form-group">
			{{ Form::label('materia', 'Materia', array('class' => 'col-sm-2 control-label'))}}
			<div class="col-sm-10">
				{{{ $errors->has('materia') ? '**' : '' }}}
				{{ Form::input('text', 'materia_name', Input::old('materia_name'), array('id'=>'materia_name','placeholder'=>'Materia'))}}
			</div>
		</div>
		
		<div class="form-group">
          
          <div class="col-sm-offset-2 col-sm-3">
            {{form::submit('Asignar',array('class'=>'btn btn-success'))}}           
          </div>
        </div>      	
	{{ Form::close();}}
@stop

@section('scripts')
	{{ HTML::script('js/scripts/carga_academica/cargaAcademica.js')}}
@stop