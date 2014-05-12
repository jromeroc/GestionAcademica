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

	{{ Form::open(array('url' => 'matriculas/alumnos-inscritos', 'method' => 'POST','class'=>'form-inline'), array('role'=>'form'))}}
	
	@else
	
	{{ Form::open(array('url' => 'matriculas/alumnos-matriculados', 'method' => 'POST','class'=>'form-inline'), array('role'=>'form'))}}

	@endif

		<!-- Año -->
		{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'control-label')) }}
        
      	{{ Form::select('year_matricula', array('0000'=>'Seleccione año',$años['lastY'] => $años['last'] , $años['year'] => $años['act'],$años['nextY'] => $años['next'])); }}
      	<!-- Grado -->
		{{ Form::label('Grados', 'Grado', array('class' => 'control-label')) }}

		{{ Form::select('Grados', $grados, null)}}		
		<!-- Alumno -->
		{{ Form::label('name_alum', 'Alumno:') }}
		
		{{ Form::Text('name_alum', null, array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
		<!-- Submit -->
		{{form::submit('Buscar Alumnos',array('class'=>'btn btn-success'))}}

	{{Form::close()}}

	@if(!empty($alumnos))

		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info">
					<th> Cod. Matricula 	</th>
					<th> Grado				</th>
					<th> Primer Apellido	</th>
					<th> Segundo Apellido	</th>
					<th> Nombres			</th>
					<th> Acciones			</th>
				</tr>
			</thead>
					
			<tbody>
				@foreach ($alumnos as $alums)
				<tr>
					<td> {{$alums->matricula}} </td>
					<td> {{$alums->Grado}} </td>
					<td> {{$alums->fname}} </td>
					<td> {{$alums->lname}} </td>
					<td> {{$alums->names}} </td>
					<td>
				   		{{ HTML::link('matriculas/editar_matricula/'.$alums->id.'/'.$año, 'Editar', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('matriculas/cancel_matricula/'.$alums->id.'/'.$año, 'Cancelar Matricula', array('class'=>'btn btn-danger'));}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
		{{$alumnos->links()}}
		</div>
	</div>
		
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