@extends('layouts.master')


@section('title')
@parent
.:: Legalización ::.
@stop

@section('modulo')
  <h1>Matriculas
      <small>Legalizaciones pendientes</small>
  </h1>
@stop

@section('content')
{{ Form::open(array('url' => 'legalizacion/matriculas-pendientes', 'method' => 'get','class'=>'form-inline'), array('role'=>'form'))}}
	
			<!-- Año Matricula -->
		{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'control-label')) }}
		@if(!empty($data))
	    <select name="year_matricula" id="year_matricula" class="form-control" required="required">
      		<!-- Seleccione año -->
			@if($data['year_matricula'] == 0000)
      			<option value="0000" selected>Seleccione año</option>
      		@else
      			<option value="0000">Seleccione año</option>
      		@endif
      		<!-- Año pasado -->
      		@if($data['year_matricula'] == $años['lastY'])
      			<option value="{{$años['lastY']}}" selected>{{$años['last']}}</option>
      		@else
      			<option value="{{$años['lastY']}}">{{$años['last']}}</option>
      		@endif
      		<!-- Año Actual -->
      		@if($data['year_matricula'] == $años['year'])
      		<option value="{{$años['year']}}" selected>{{$años['act']}}</option>
      		@else
      		<option value="{{$años['year']}}">{{$años['act']}}</option>
      		@endif
      		<!-- Año Siguiente -->
      		@if($data['year_matricula'] == $años['nextY'])
      		<option value="{{$años['nextY']}}" selected>{{$años['next']}}</option>
      		@else
      		<option value="{{$años['nextY']}}">{{$años['next']}}</option>
      		@endif
      	</select>
		@else
	    {{ Form::select('year_matricula', array('0000'=>'Seleccione año',$años['lastY'] => $años['last'] , $años['year'] => $años['act'],$años['nextY'] => $años['next'])); }}
	    @endif
	    <!-- Alumno -->
	    {{ Form::label('name_alum', 'Alumno:') }}
		@if(!empty($data))
			{{ Form::Text('name_alum', $data['name_alum'], array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
		@else
			{{ Form::Text('name_alum', null, array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
		@endif
		<!-- Submit -->
		{{form::submit('Buscar Alumnos',array('class'=>'btn btn-success'))}}

{{Form::close()}}

	@if(!empty($alums))
		<br>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info">
					
					<th> Padre			</th>
					<th> Madre			</th>
					<th> Matricula		</th>
					<th> Alumno			</th>
				</tr>
			</thead>
					
			<tbody>
				@foreach ($alums as $alumns)
				<tr>
					<td> {{$alumns->namepapa}} </td>
					<td> {{$alumns->namemama}} </td>
					<td> {{$alumns->matricula}} </td>
					<td> {{$alumns->namealum}} </td>
				@endforeach
			</tbody>
		</table>
		<br>
		{{--{{$alums->appends(array('year_matricula' => $data['year_matricula'],'name_alum'=>$data['name_alum']))->links()}}--}}
		</div>
	</div>
	@endif

@stop