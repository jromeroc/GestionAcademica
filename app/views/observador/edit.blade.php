@extends('layouts.master')

@section('title')
@parent
.:: Observador ::.
@stop

@section('modulo')
  <h1>Observaciones <small>Editar Observación</small></h1>
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

{{ Form::model($Observacion, array('url' => 'observador/edit', 'method' => 'POST','class'=>'form-horizontal col-sm -6'), array('role'=>'form'))}}
      <!-- Fecha  !-->

      <div class="form-group">
        {{ Form::label('fecha', 'Fecha', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{ Form::Text('fecha',$datos['fecha'], array('placeholder' => 'Fecha Observacion', 'class' => 'col-sm-2 form-control')) }}
        </div>
      </div>

      <!-- Docente  !-->
      <div class="form-group">
        {{ Form::label('docente_srch', 'Docente',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{ Form::Text('docente_srch', $datos['docente'] , array('placeholder' => 'Docente', 'class' => 'col-sm-2 form-control')) }}
          <input type="hidden" name="id_docente" id="id_docente" class="form-group" value="$datos['id_docente']">
        </div>
      </div>

      <!-- Descripcion  !-->
      <div class="form-group">
        {{ Form::label('descripcion', 'Descripcion',array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          {{ Form::textarea('descripcion', $datos['descripcion'], array('placeholder' => 'Descripcion de la Observacion', 'class' => 'col-sm-2 form-control')) }}
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

        <!-- Seleccionar alumnos  !-->
        <div class="form-group"> 
          <div class="col-sm-offset-2 col-sm-4">            
            {{form::button('Seleccionar Alumnos',array('id'=>'slt_list_grupo','class'=>'col-sm-6 btn btn-info'))}}

          </div>
        </div>

        <!-- Mensaje Alumnos !-->  
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-4">
            <div class="alert " id="msnalum" style="display:none"></div>
          </div>
        </div>

        <!-- Guardar !-->    
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-2">
            {{form::submit('Guardar',array('class'=>'btn btn-success'))}}           
          </div>
        </div>

        <!-- Modal Alumnos !--> 
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
                <button type="button" class="btn btn-success" id="select-alums">Aceptar</button>

              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div>

{{ Form::close() }}



@stop

@section('scripts')
  {{HTML::script('js/scripts/observador/observador.js')}}
@stop