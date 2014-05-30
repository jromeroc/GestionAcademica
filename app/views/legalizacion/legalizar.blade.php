@extends('layouts.master')


@section('title')
@parent
.:: Legalización ::.
@stop

@section('modulo')
  <h2>Matriculas<small>Legalizadas</small> </h2>
@stop

@section('content')

	<table class="table">
		<thead>
			<tr>
				<th>Nombre Papá</th>
				<th>Nombre Mamá</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$papa['nombre']}}</td>
				<td>{{$mama['nombre']}}</td>
			</tr>
		</tbody>
	</table>


	<legend><h4>Hijos</h4></legend>

	<table class="table">
		<thead>
			<tr>
				<th>Grado	</th>
				<th>Nombre	</th>
			</tr>
		</thead>
		<tbody>
            @foreach($hijo as $hijos)  
                <tr>
                    <td>{{$hijos['grado']}}°</td>
                    <td>{{$hijos['nombre']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ Form::open(array('url' => 'legalizacion/legalizar/', 'method' => 'POST','class'=>'form-inline'), array('role'=>'form'))}}
    	<legend><h4 >Documentación</h4></legend>
        <div class="col-sm-4">
            <div class="radio">
                <label>
                    Firma solo Papá            
                    <input type="radio" id="papa" name="firma" value="0"> 
                </label>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="radio">
                <label>
                    Firma solo Mamá            
                    <input type="radio" id="mama" name="firma" value="1">
                </label>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="radio">
                <label>
                    Firman Ambos            
                    <input type="radio" id="ambos" name="firma" value="2">
                </label>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<br>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                
            </div>
            {{ HTML::link('legalizacion/docs/pagare/'.$papa['id'].'/'.$mama['id'].'/2', 'Pagare', array('class'=>'btn btn-primary col-sm-1','target'=>"_blank"));}}
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

            </div>
            
            {{ HTML::link('legalizacion/docs/contrato/'.$papa['id'].'/'.$mama['id'].'/0', 'Contrato', array('class'=>'btn btn-primary col-sm-1','target'=>"_blank"));}}
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

            </div>
            
        	{{ HTML::link('legalizacion/docs/enfermeria'.$papa['id'].'/'.$mama['id'].'/0', 'Enfermeria', array('class'=>'btn btn-primary col-sm-1','target'=>"_blank"));}}
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

            </div>
        	
        	{{ HTML::link('legalizacion/docs/contabilidad'.$papa['id'].'/'.$mama['id'].'/0', 'Contabilidad', array('class'=>'btn btn-primary col-sm-2','target'=>"_blank"));}}
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

            </div>
        	
        	{{ HTML::link('legalizacion/docs/matricula', 'Matricula', array('class'=>'btn btn-primary col-sm-1','target'=>"_blank"));}}
        </div>

@stop