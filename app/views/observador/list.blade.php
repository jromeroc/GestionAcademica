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
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{ Form::model($observaciones, array('url' => 'observador/informe', 'method' => 'POST','class'=>'form-inline col-sm-12'), array('role'=>'form'))}}
      
      <span><strong>Fecha Inicio</strong></span>
      <input type="date" name="datepickerini" id="datepickerini" class="form-control" value="">
      
      <span><strong>Fecha Fin</strong></span>
      <input type="date" name="datepickerfin" id="datepickerfin" class="form-control" value="">
      
      <span><strong>Alumno</strong></span>
      <input type="text" name="alum_srch" id="alum_srch" class="form-control" value="">
      <input type="hidden" name="id_alumno" id="id_alumno" class="form-group" value="">
      
      <span><strong>Grado</strong></span>
      {{{ $errors->has('grupo') ? '**' : '' }}}
      {{ Form::select('grupo', $grupos, null)}}

      <button type="submit" class="btn btn-success">Buscar</button>
    {{Form::close()}}
  </div>
    <br>
	<table class="table table-striped">
    <tr class="info">
        <th>Fecha</th>
        <th>Docente</th>
        <th>Descripción</th>
        <th>Grupo</th>
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
  {{HTML::script('js/scripts/observador/observador.js')}}
@stop