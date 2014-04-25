@extends('layouts.master')

@section('title')

@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas <small>Matriculados</small></h1>
@stop

@section('content')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		{{ Form::open(array('url' => 'matriculas/srch_alum_matri', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
			<div class="form-group col-sm-12">
      			{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'col-sm-2 control-label')) }}
        		<div class="col-sm-2">
      				{{ Form::select('year_matricula', array('0000'=>'Seleccione año',$años['lastY'] => $años['last'] , $años['year'] => $años['act'],$años['nextY'] => $años['next'])); }}
      			</div>
      		</div>
      		
      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      				
      			</div>      			

      			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
      				<label class="alert alert-info col-sm-6 text-center">Filtro Adicional</label>
      			</div>      			

      			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
      				
      			</div>
      		
      		</div>

      		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


	      		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						{{ Form::label('Grados', 'Grado', array('class' => 'col-sm-2 control-label')) }}
					</div>

					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						{{ Form::select('Grados', $grados, null)}}</p>		
					</div>
				</div>

				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
						{{ Form::label('name_alum', 'Alumno:') }}
					</div>

					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						{{ Form::Text('name_alum', null, array('placeholder' => 'Nombre Alumno', 'class' => 'form-control')) }}
					</div>
				</div>

	      		<div class="col-sm-2">
	      			{{form::submit('Buscar Alumnos',array('class'=>'btn btn-success col-sm-12'))}}
	   			</div>
      		</div>
		{{Form::close()}}
	</div>

	<br>
	<br>

	@if(!empty($alumnos))

		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info">
					<th> Grado				</th>
					<th> Segundo Apellido	</th>
					<th> Primer Apellido	</th>
					<th> Nombres			</th>
					<th> Cod. Matricula 	</th>
					<th> Acciones			</th>
				</tr>
			</thead>
					
			<tbody>
				@foreach ($alumnos as $alums)
				<tr>
					<td> {{$alums->Grado}} </td>
					<td> {{$alums->lname}} </td>
					<td> {{$alums->fname}} </td>
					<td> {{$alums->names}} </td>
					<td> {{$alums->matricula}} </td>
					<td>
				   		{{ HTML::link('observador/delete/', 'Editar', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('observador/delete/', 'Cancelar Matricula', array('class'=>'btn btn-danger'));}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
		
	@endif
	@if(!empty($mensaje))

	<div class="form-group col-sm-3 alert alert-warning" id="msg_alums_matri">
        <h4>{{$mensaje}}</h4>
    </div>

	@endif
@stop

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop