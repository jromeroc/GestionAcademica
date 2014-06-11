@extends('layouts.master')

@section('title')

@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas 
  	@if(!empty($inscritos))
  	<small>Inscritos</small>
  	@else
  	<small>Matriculados</small>
  	@endif
  </h1>
@stop

@section('content')
		
	@if(!empty($inscritos))

	{{ Form::open(array('url' => 'matriculas/alumnos-inscritos', 'method' => 'get','class'=>'form-inline'), array('role'=>'form'))}}
	
	@else
	
	{{ Form::open(array('url' => 'matriculas/alumnos-matriculados', 'method' => 'get','class'=>'form-inline'), array('role'=>'form'))}}

	@endif

		<!-- Año -->

		{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'control-label')) }}
		@if(isset($data))
      	<select name="year_matricula" id="year_matricula" class="form-control" required="required">
      		<!-- Seleccione año -->
			    @if($data['year_matricula'] == 0000)
      			<option value="0000" selected>Seleccione año</option>
      		@else
      			<option value="0000">Seleccione año</option>
      		@endif
      		<!-- Año pasado -->
      		@if($data['year_matricula'] == $anos['lastY'])
      			<option value="{{$anos['lastY']}}" selected>{{$anos['last']}}</option>
      		@else
      			<option value="{{$anos['lastY']}}">{{$anos['last']}}</option>
      		@endif
      		<!-- Año Actual -->
      		@if($data['year_matricula'] == $anos['year'])
      		<option value="{{$anos['year']}}" selected>{{$anos['act']}}</option>
      		@else
      		<option value="{{$anos['year']}}">{{$anos['act']}}</option>
      		@endif
      		<!-- Año Siguiente -->
      		@if($data['year_matricula'] == $anos['nextY'])
      		<option value="{{$anos['nextY']}}" selected>{{$anos['next']}}</option>
      		@else
      		<option value="{{$anos['nextY']}}">{{$anos['next']}}</option>
      		@endif
      	</select>
        
        @else
      	
      	{{ Form::select('year_matricula', array('0000'=>'Seleccione año',$anos['lastY'] => $anos['last'] , $anos['year'] => $anos['act'],$anos['nextY'] => $anos['next'])); }}
        
        @endif

      	<!-- Grado -->

		{{ Form::label('Grados', 'Grado', array('class' => 'control-label')) }}
		@if(isset($data))
		{{ Form::select('Grados', $grados, $data['Grados'])}}		
        @else
		{{ Form::select('Grados', $grados, null)}}		
        @endif

		<!-- Alumno -->

		{{ Form::label('name_alum', 'Alumno:') }}
		@if(isset($data))
		{{ Form::Text('name_alum', $data['name_alum'], array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
        @else
		{{ Form::Text('name_alum', null, array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
        @endif
		
		<!-- Submit -->
		{{form::submit('Buscar Alumnos',array('class'=>'btn btn-success'))}}

	{{Form::close()}}

	@if(!empty($alumnos))
    @include('matriculas.allalums')
	@endif

	@if(!empty($mensaje))

	<div class="form-group col-sm-3 alert alert-danger" id="msg_alums_matri">
        <h4>{{$mensaje}}</h4>
    </div>

	@endif

	@if(!empty($mensaje_cancel))

	<div class="form-group col-sm-3 alert alert-success" id="mensaje_cancel">
        <h4>{{$mensaje_cancel}}</h4>
    </div>

	@endif

	@if(!empty($mensaje_update))

	<div class="form-group col-sm-3 alert alert-success" id="mensaje_update">
        <h4>{{$mensaje_update}}</h4>
    </div>

	@endif

@stop

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop
