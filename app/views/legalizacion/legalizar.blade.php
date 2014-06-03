@extends('layouts.master')


@section('title')
@parent
.:: Legalización ::.
@stop

@section('modulo')
  <h2>Matriculas <small>Legalizadas</small></h2>
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

	<table class="table">
		<thead>
            <tr>
                <th colspan="2">Hijos</th>
            </tr>   
			<tr>
				<th>Grado	</th>
				<th>Nombre	</th>
			</tr>
		</thead>
		<tbody>
            @foreach($hijo as $hijos)  
                <tr>
                    <td>{{$hijos['grado']}}</td>
                    <td>{{$hijos['nombre']}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4><strong>Documentación</strong></h4>
    {{ Form::open(array('url' => 'legalizacion/docs/'.$papa['id'].'/'.$mama['id'].'/'.$year, 'method' => 'POST','class'=>'form-inline', 'id'=> 'documents', 'target'=> '_blank'), array('role'=>'form'))}}

        <div class="panel panel-default">
        
            @if ($papa['id'] != 1)
                <div class="col-sm-4">
                    <div class="radio">
                        <label>
                                Firma solo Papá            
                                <input type="radio" id="papa" name="firma" value="0">
                        </label>
                    </div>
                </div>
            @endif
            @if ($mama['id'] != 1)
                <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            Firma solo Mamá            
                            <input type="radio" id="mama" name="firma" value="1">
                        </label>
                    </div>
                </div>
            @endif
            @if ($papa['id'] != 1 || $mama['id'] != 1)
                <div class="col-sm-4">
                    <div class="radio">
                        <label>
                            Firman Ambos            
                            <input type="radio" id="ambos" name="firma" value="2">
                        </label>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-10 col-md-offset-2">
            {{ Form::button('Contrato', array('class'=>'btn btn-primary', 'onclick' => 'impress(1)')) }}
            {{ Form::button('Pagare', array('class'=>'btn btn-primary', 'onclick' => 'impress(2)')) }}
            {{ Form::button('Contabilidad', array('class'=>'btn btn-primary', 'onclick' => 'impress(3)')) }}
            {{ Form::button('Enfermeria', array('class'=>'btn btn-primary', 'onclick' => 'impress(4)')) }}
            {{ Form::button('Matricula', array('class'=>'btn btn-primary', 'onclick' => 'impress(5)')) }}
        </div>
        {{ Form::hidden('doc', '', array('id'=>'doc'))}}
    {{ Form::close() }}
@stop

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/legalizar.js') }}
@stop