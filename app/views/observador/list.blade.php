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

	<table class="table table-striped">
    <tr>
        <th>Fecha</th>
        <th>Docente</th>
        <th>descripcion</th>
        <th>grupo</th>
        <th>Alumno</th>
        <th></th>
    </tr>
     @foreach ($datos as $info_Observador)
    <tr>
        <td>  {{ $info_Observador->fecha}}       </td>
        <td>	{{ $info_Observador->docente}}     </td>
        <td>	{{ $info_Observador->descripcion}} </td>
        <td>  {{ $info_Observador->namegroup}}   </td>
        <td>  {{ $info_Observador->alumname}}    </td>
        <td>
          
          {{ HTML::link('observador/edit/'.$info_Observador->id, 'Editar', array('class'=>'btn btn-info'));}}

          {{ HTML::link('observador/delete/'. $info_Observador->id.'/'.$info_Observador->idalumn, 'Eliminar', array('class'=>'btn btn-danger'));}}
        </td>
    </tr>
    @endforeach
  </table>
  {{ $observaciones->links() }}
@stop

@section('scripts')
  {{HTML::script('js/bootstrap.js')}}
  {{HTML::script('js/general.js')}}
  {{HTML::script('js/jquery-1.11.0.js')}}
  {{HTML::script('js/bootstrap.min.js')}}
@stop