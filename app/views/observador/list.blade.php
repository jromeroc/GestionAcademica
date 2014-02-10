@extends('layouts.master')

@section('title')
@parent
.:: Observaciones ::.
@stop

@section('modulo')
	<h1>Observaciones <small>Todas las Observaciones</small></h1>
@stop

@section('content')

	<h2>Lista de Observaciones</h2>

	<table class="table table-striped" style="width: 900px">
    <tr>
        <th>Fecha</th>
        <th>id_docente</th>
        <th>descripcion</th>
        <th>grupo</th>
        <th>Acciones</th>
    </tr>
     @foreach ($observaciones as $info_Observador)
    <tr>
        <td>	{{ $info_Observador->fecha }}		</td>
        <td>	{{ $info_Observador->id_docente }}	</td>
        <td>	{{ $info_Observador->descripcion }}	</td>
        <td>	{{ $info_Observador->grupo }}		</td>
        <td>
          {{ HTML::link('observador/show/'. $info_Observador->id, 'Ver', array('class'=>'btn btn-info'));}}
          
          {{ HTML::link('observador/edit/'. $info_Observador->id, 'Editar', array('class'=>'btn btn-primary'));}}

          {{ HTML::link('observador/delete/'. $info_Observador->id, 'Eliminar', array('class'=>'btn btn-danger'));}}
        </td>
    </tr>
    @endforeach
  </table>
  {{ $observaciones->links() }}
@stop

@section('scripts')
  {{HTML::script('js/bootstrap.js')}}
  {{HTML::script('js/jquery-1.11.0.js')}}
  {{HTML::script('js/bootstrap.min.js')}}
@stop