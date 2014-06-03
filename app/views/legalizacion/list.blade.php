@extends('layouts.master')


@section('title')
@parent
.:: Legalización ::.
@stop

@section('modulo')
  <h2>Matriculas
  	  @if ($type)
      		<small>Legalizadas</small>
  		@else
      		<small>Pendientes</small>
  	  @endif
  </h2>
@stop


@section('content')
	{{ Form::open(array('url' => 'legalizacion/filtro-matriculas/'.$type, 'method' => 'post','class'=>'form-inline'), array('role'=>'form'))}}

		<!-- Año Matricula -->
		{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'control-label')) }}
		@if(!empty($data))
	    <select name="year_matricula" id="year_matricula" class="form-control" required="required">
      		<!-- Seleccione año -->
			@if($data['year_matricula'] == 0)
      			<option value="0" selected>Seleccione año</option>
      		@else
      			<option value="0">Seleccione año</option>
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
	    {{ Form::select('year_matricula', array('0'=>'Seleccione año',$anos['lastY'] => $anos['last'] , $anos['year'] => $anos['act'],$anos['nextY'] => $anos['next'])); }}
	    @endif
	    <!-- Alumno -->
	    {{ Form::label('name_alum', 'Buscar:') }}
		@if(!empty($data))
			{{ Form::Text('name_alum', $data['name_alum'], array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
		@else
			{{ Form::Text('name_alum', null, array('placeholder' => 'Buscar familia', 'class' => 'form-control')) }}
		@endif
		<!-- Submit -->
		{{form::submit('Filtrar',array('class'=>'btn btn-success'))}}

	{{Form::close()}}

	@if(!empty($family))
		<br>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info">
					<th> Familia</th>
					<th> Papá	</th>
					<th> Mamá	</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				@foreach ($family as $infoFamily)
				<tr>
					<td> {{$infoFamily->familia}} </td>
					<td> {{$infoFamily->namepapa}} </td>
					<td> {{$infoFamily->namemama}} </td>
					<td> {{ HTML::link('/legalizacion/legalizar/'.$infoFamily->idpapa.'/'.$infoFamily->idmama.'/'.$year,'Legalizar',array('class' => 'btn btn-primary')) }}</td>
				@endforeach
			</tbody>
		</table>
		
	</div>
	@endif


@stop
