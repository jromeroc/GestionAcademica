@extends('layouts.master')

@section('title')
@parent
.:: Observador ::.
@stop


@section('modulo')
  <h1>Observaciones <small>Nueva Observación</small></h1>
@stop

@section ('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

  {{ Form::model($observador, array('url' => 'observador/nuevo', 'method' => 'POST','class'=>'form-horizontal col-sm -6'), array('role'=>'form'))}}
      <!-- Fecha  !-->
      <div class="form-group">
      {{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::Text('fecha', null, array('placeholder' => 'Fecha Observacion', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Docente  !-->
      <div class="form-group">
      {{ Form::label('docente_srch', 'Docente',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{ Form::Text('docente_srch', null, array('placeholder' => 'Docente', 'class' => 'col-sm-2 form-control')) }}
          <input type="hidden" name="id_docente" id="id_docente" class="form-group" value="">
        </div>
      </div>

      <div class="form-group">
      {{ Form::label('descripcion', 'Descripcion',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      {{ Form::textarea('descripcion', null, array('placeholder' => 'Descripcion de la Observacion', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>
      <!-- Select grupo  !-->
        <div class="form-group">
          {{ Form::label('grupo', 'Grado', array('class' => 'col-sm-2 control-label'))}}
          <div class="col-sm-2">
            {{{ $errors->has('grupo') ? '**' : '' }}}
            {{ Form::select('grupo', $grupos, null)}}
          </div>
        </div>
        <!-- Select alumno  !-->
        <div class="form-group">
            
          <div class="col-sm-offset-2 col-sm-4">            
            {{form::button('Seleccionar Alumnos',array('id'=>'slt_list_grupo','class'=>'col-sm-6 btn btn-info'))}}

          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
          <h3 id="msnalum"></h3>
          </div>
        </div>

        <!-- Guardar !-->    
        <div class="form-group">
          
          <div class="col-sm-offset-2 col-sm-3">
            {{form::submit('Guardar',array('class'=>'btn btn-success'))}}           
          </div>

        </div>

{{ Form::close() }}
  
  
  <div class="modal fade" id="modal-list">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header alert alert-info">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Seleccione los alumnos para aplicar esta observacion</h4>
        </div>
        <div class="modal-body" id="list-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" id="ProcessD">Aceptar</button>

        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@stop

@section('scripts')
  {{HTML::script('js/scripts/observador/observador.js')}}
@stop