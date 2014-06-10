@extends('layouts.master')


@section('title')
@parent
.:: Matriculas ::.
@stop

@section('modulo')
  <h1>Matriculas 
    @if(!empty($alum))
      <small>Editar Matricula</small>
    @else 
      <small>Nueva Matricula</small>
    @endif
  </h1>
@stop
@section('content')

	{{-- Errores --}}
	
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

	{{-- Formulario --}}
  @if(empty($alum))
  	{{ Form::open(array('url' => 'matriculas/nuevo', 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
  @else
    {{ Form::open(array('url' => 'matriculas/update_matricula/'.$id_alum.'/'.$ano_matri, 'method' => 'POST','class'=>'col-sm -6'), array('role'=>'form'))}}
  @endif		
      <!-- Año Matricula  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('year_matricula', 'Año Matricula', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
      		{{ Form::select('year_matricula', array('0000'=>'Seleccione año',$anos['lastY'] => $anos['last'] , $anos['year'] => $anos['act'],$anos['nextY'] => $anos['next'])); }}
      	</div>
      </div>

  		<div class="form-group col-sm-12">
      	
        @if(empty($alum))
          {{ Form::label('tipo_reg', 'Tipo de Registro', array('class' => 'col-sm-2 control-label')) }}
          <!-- Inscripcion  !-->
          <div class="col-sm-1">
            <div class="radio">
              <label>
                <input type="radio" id="Inscripcion" name="T-reg" value="0">
                Inscripcion
              </label>
            </div>
          </div>
        	<!-- Matricula  !-->
          <div class="col-sm-1">
            <div class="radio">
              <label>
                <input type="radio" id="Matricula" name="T-reg" value="1">
                Matricula
              </label>
            </div>
          </div>
        @endif

        @if(!empty($alum))
          {{ Form::label('tipo_reg', 'Tipo de Registro', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-1">
            <div class="radio">
                <label>
                  @if($alum['matriculado']==0)
                  <input type="radio" id="Inscripcion" name="T-reg" value="0" checked="checked">
                  Inscripcion
                  @else
                  <input type="radio" id="Inscripcion" name="T-reg" value="0">
                  Inscripcion
                  @endif
                </label>
            </div>
          </div>
          <!-- Matricula  !-->
          <div class="col-sm-1">
            <div class="radio">
              <label>
                @if($alum['matriculado']==1)
                <input type="radio" id="Matricula" name="T-reg" value="1" checked="checked">
                Matricula
                @else
                <input type="radio" id="Matricula" name="T-reg" value="1">
                Matricula
                @endif
              </label>
            </div>
          </div>
        @endif

      </div>
      <!-- Fecha  !-->
  		<div class="form-group col-sm-12" style="display:none" id="fecha">

      	{{ Form::label('fecha_matricula', 'Fecha matricula', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
          @if(!empty($alum['date_matricula']))
          {{ Form::Text('fecha_matricula', $alum['date_matricula'], array('placeholder' => 'Fecha Matricula', 'class' => 'col-sm-2 form-control')) }}
          @else
      		{{ Form::Text('fecha_matricula', null, array('placeholder' => 'Fecha Matricula', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>
      

      <!-- Grado  !-->
      <div class="form-group col-sm-12">
          {{ Form::label('grado', 'Grado', array('class' => 'col-sm-2 control-label')) }}

          <div class="col-sm-3">
            @if(!empty($alum['grado']))
            {{{ $errors->has('grado') ? '**' : '' }}}
            {{ Form::select('grado', $grado, $alum['grado'])}}
            @else
            {{{ $errors->has('grado') ? '**' : '' }}}
            {{ Form::select('grado', $grado, null)}}
            @endif
          </div>
			
		  </div>

		  <!-- Nombre  !-->
  		<div class="form-group col-sm-12">
    		{{ Form::label('alum', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
            @if(!empty($alum['names']))
              {{ Form::Text('alum', $alum['names'], array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
            @else
          		{{ Form::Text('alum', null, array('placeholder' => 'Nombre', 'class' => 'col-sm-2 form-control')) }}
            @endif
          
        </div>
      </div>
      {{ Form::hidden('id_alum',null, array('id' => 'id_alum')) }}
      
      <!-- Apellido 1  !-->
  		<div class="form-group col-sm-12">
     		{{ Form::label('fname', 'Primer apellido', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
            @if(!empty($alum['fname']))
              {{ Form::Text('fname', $alum['fname'], array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
            @else
     			    {{ Form::Text('fname', null, array('placeholder' => 'Primer Apellido', 'class' => 'col-sm-2 form-control')) }}
            @endif
          
       	</div>
      </div>

      <!-- Apellido 2  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('lnane', 'Segundo apellido', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          @if(!empty($alum['lname']))
            {{ Form::Text('lnane', $alum['lname'], array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
          @else
      			{{ Form::Text('lnane', null, array('placeholder' => 'Segundo Apellido', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>

      
      <div class="form-group col-sm-12">
        {{ Form::label('fecha_nac', 'Fecha de nacimiento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          @if(!empty($alum['date_born']))
            {{ Form::Text('fecha_nac', $alum['date_born'], array('placeholder' => 'Fecha de Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @else
            {{ Form::Text('fecha_nac', null, array('placeholder' => 'Fecha de Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>

      <!-- Tipo Documento  !-->
  		<div class="form-group col-sm-12">
        {{ Form::label('tipo_doc', 'Tipo Documento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
            @if(!empty($alum['tipo_document']))
              {{{ $errors->has('tipo_doc') ? '**' : '' }}}
              {{ Form::select('tipo_doc', $tipodoc, $alum['tipo_document'])}}
            @else
              {{{ $errors->has('tipo_doc') ? '**' : '' }}}
              {{ Form::select('tipo_doc', $tipodoc, null)}}
            @endif
          
        </div>
      </div>

      <!-- Numero Documento  !-->
      <div class="form-group col-sm-12">
        {{ Form::label('n_document', 'Numero Identidad', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
            @if(!empty($alum['num_document']))
              {{ Form::Text('n_document', $alum['num_document'], array('placeholder' => 'Numero de identidad', 'class' => 'col-sm-2 form-control')) }}
            @else
              {{ Form::Text('n_document', null, array('placeholder' => 'Numero de identidad', 'class' => 'col-sm-2 form-control')) }}
            @endif
          
        </div>
      </div>      

      <!-- Exp Documento  !-->
      <div class="form-group col-sm-12">
        {{ Form::label('city_exp', 'Ciudad de Expedicion', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          @if(!empty($alum))
          {{ Form::Text('city_exp', $alum['city_born_name'] , array('placeholder' => 'Ciudad Expedicion', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('city_exp', null, array('placeholder' => 'Ciudad Expedicion', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>
      @if(!empty($alum['id_ciudad']))
      {{ Form::hidden('id_city_exp',$alum['city_born_id'], array('id' => 'id_city_exp')) }}
      @else
      {{ Form::hidden('id_city_exp',null, array('id' => 'id_city_exp')) }}
      @endif
      <!-- Pais Nacimiento  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('pais_srch', 'Pais de nacimiento', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
          @if(!empty($alum))
          {{ Form::Text('pais_srch', $alum['name_pais'], array('placeholder' => 'Pais Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('pais_srch', null, array('placeholder' => 'Pais Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>
        @if(!empty($alum))
        {{ Form::hidden('id_pais',$alum['id_pais'], array('id' => 'id_pais')) }}  
        @else
        {{ Form::hidden('id_pais',null, array('id' => 'id_pais')) }}  
        @endif


      <!-- Ciudad Nacimiento  !-->
  		<div class="form-group col-sm-12">
        {{ Form::label('city_srch', 'Ciudad de nacimiento', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-2">
          @if(!empty($alum))
          {{ Form::Text('city_srch',$alum['nombre_ciudad'], array('placeholder' => 'Ciudad Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('city_srch',null, array('placeholder' => 'Ciudad Nacimiento', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>
      @if(!empty($alum))
      {{ Form::hidden('id_city', $alum['id_ciudad'] , array('id' => 'id_city')) }}
      @else
      {{ Form::hidden('id_city',null, array('id' => 'id_city')) }}
      @endif

      <!-- Genero  !-->
      <div class="form-group col-sm-12">
      	{{ Form::label('Sexo', 'Sexo', array('class' => 'col-sm-2 control-label')) }}
            @if(empty($alum))
              <!-- Masculino  !-->
        			<div class="col-sm-1">
        			  <div class="radio">
        			    <label>
        					  <input type="radio" name="genero" id="genero" value="1">
        					  M
        			    </label>
        			  </div>
            	</div>

              <!-- Femenino  !-->
              <div class="col-sm-1">
                <div class="radio">
                  <label>
                    <input type="radio" name="genero" id="genero" value="0">
                    F
                  </label>
                </div>
              </div>
            @else
              <!-- Masculino  !-->
              <div class="col-sm-1">
                <div class="radio">
                  <label>
                    @if($alum['sexo']==1)
                    <input type="radio" name="genero" id="genero" value="1" checked="checked">
                    M
                    @else
                    <input type="radio" name="genero" id="genero" value="1">
                    @endif
                  </label>
                </div>
              </div>

              <!-- Femenino  !-->
              <div class="col-sm-1">
                <div class="radio">
                  <label>
                    @if($alum['sexo']==0)
                    <input type="radio" name="genero" id="genero" value="0" checked="checked">
                    F
                    @else
                    <input type="radio" name="genero" id="genero" value="0">
                    F
                    @endif
                  </label>
                </div>
              </div>
            @endif
        

      </div>

      <!-- Grupo Sanguineo  !-->
  		<div class="form-group col-sm-12">
      	{{ Form::label('g_sang', 'Grupo Sanguineo', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
          @if(!empty($alum['grupo_san']))
            {{ Form::select('g_sang', array(
              ''=>'Seleccione Grupo',
              'A'  => 'A',
              'B'  => 'B',
              'AB' => 'AB',
              'O' => 'O'
              )); }}
          @else
            {{ Form::select('g_sang', array(
              ''=>'Seleccione Grupo',
              'A'  => 'A',
              'B'  => 'B',
              'AB' => 'AB',
              'O' => 'O'
              )); }}
          @endif
        </div>
      </div>

      <!-- RH  !-->

      <div class="form-group col-sm-12">
      {{ Form::label('RH', 'RH', array('class' => 'col-sm-2 control-label')) }}
      	@if(empty($alum))	
      	<!-- Positivo  !-->
        <div class="col-sm-1">
          <div class="radio">
            <label>
              <input type="radio" name="RH" id="RH" value="+">
              +
            </label>
          </div>
        </div>

      	<!-- Negativo  !-->
  			<div class="col-sm-1">
  				<div class="radio">
  					<label>
  						<input type="radio" name="RH" id="RH" value="-">
  						-
  					</label>
  				</div>
      	</div>
        @else
        <!-- Positivo  !-->
        <div class="col-sm-1">
          <div class="radio">
            <label>
              @if($alum['rh']=='+')
                <input type="radio" name="RH" id="RH" value="+" checked="checked">
                +
              @else
                <input type="radio" name="RH" id="RH" value="+">
                +
              @endif
            </label>
          </div>
        </div>

        <!-- Negativo  !-->
        <div class="col-sm-1">
          <div class="radio">
            <label>
            @if($alum['rh']=='-')
              <input type="radio" name="RH" id="RH" value="-" checked="checked">
              -
            @else
              <input type="radio" name="RH" id="RH" value="-">
              -
            @endif
            </label>
          </div>
        </div>
        @endif
      	</div>

      <!-- EPS  !-->
  		<div class="form-group col-sm-12">
      {{ Form::label('eps', 'Eps', array('class' => 'col-sm-2 control-label')) }}
       	<div class="col-sm-2">
          @if(!empty($alum['eps']))
          {{ Form::Text('eps', $alum['eps'], array('placeholder' => 'Eps', 'class' => 'col-sm-2 form-control')) }}
          @else
          {{ Form::Text('eps', null, array('placeholder' => 'Eps', 'class' => 'col-sm-2 form-control')) }}
          @endif
        </div>
      </div>

        <!-- Tipo de hermano  !-->
        <div class="form-group col-sm-12">
      		{{ Form::label('t_hermano', 'Tipo de hermano', array('class' => 'col-sm-2 control-label')) }}
      	</div>
        @if(empty($alum))
        <div class="form-group col-sm-6">
      		<!-- No tiene  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" id="T-Herm" value="0">
  						No aplica
  					</label>
  				</div>
      		</div>

      		<!-- Mayor  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" id="T-Herm" value="1">
  						Mayor
  					</label>
  				</div>
      		</div>
          
      		<!-- Menor  !-->
  			<div class="col-sm-3">
  				<div class="radio">
  					<label>
  						<input type="radio" name="T-Herm" id="T-Herm" value="2">
  						Menor
  					</label>
  				</div>
      		</div>

      	</div>
      	@else

        <div class="form-group col-sm-6">
          <!-- No tiene  !-->
        <div class="col-sm-3">
          <div class="radio">
            <label>
              @if($alum['tipo_hermano']==0)
              <input type="radio" name="T-Herm" id="T-Herm" value="0" checked="checked">
              No aplica
              @else
              <input type="radio" name="T-Herm" id="T-Herm" value="0">
              No aplica
              @endif
            </label>
          </div>
          </div>

          <!-- Mayor  !-->
        <div class="col-sm-3">
          <div class="radio">
            <label>
              @if($alum['tipo_hermano']==1)
              <input type="radio" name="T-Herm" id="T-Herm" value="1" checked="checked">
              Mayor
              @else
              <input type="radio" name="T-Herm" id="T-Herm" value="1">
              Mayor
              @endif
            </label>
          </div>
          </div>
          
          <!-- Menor  !-->
        <div class="col-sm-3">
          <div class="radio">
            <label>
              @if($alum['tipo_hermano']==2)
                <input type="radio" name="T-Herm" id="T-Herm" value="2" checked="checked">
                Menor
              @else
                <input type="radio" name="T-Herm" id="T-Herm" value="2">
                Menor
              @endif
              
            </label>
          </div>
        </div>

        </div>

        @endif	
      	<!-- Direccion de residencia  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('direcc', 'Direccion de Residencia', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
            @if(!empty($alum['direccion']))
            {{ Form::Text('direcc', $alum['direccion'], array('placeholder' => 'Direccion de Residencia', 'class' => 'col-sm-2 form-control')) }}
            @else
      			{{ Form::Text('direcc', null, array('placeholder' => 'Direccion de Residencia', 'class' => 'col-sm-2 form-control')) }}
            @endif
          </div>
        </div>

        <!-- Fijo  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('fijo', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
            @if(!empty($alum['telefono']))
            {{ Form::Text('fijo', $alum['telefono'], array('placeholder' => 'Telefono', 'class' => 'col-sm-2 form-control')) }}
            @else
            {{ Form::Text('fijo', null, array('placeholder' => 'Telefono', 'class' => 'col-sm-2 form-control')) }}
            @endif
      		</div>
        </div>

        <!-- Celular  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('cel', 'Celular', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
            @if(!empty($alum['celular']))
            {{ Form::Text('cel', $alum['celular'], array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
            @else
            {{ Form::Text('cel', null, array('placeholder' => 'Celular', 'class' => 'col-sm-2 form-control')) }}
      		  @endif
          </div>
        </div>

        <!-- Email  !-->
  		<div class="form-group col-sm-12">
      		{{ Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) }}
        	<div class="col-sm-2">
            @if(!empty($alum['mail']))
            {{ Form::email('email', $alum['mail'], array('placeholder' => 'E-Mail', 'class' => 'col-sm-2 form-control')) }}
            @else
            {{ Form::email('email', null, array('placeholder' => 'E-Mail', 'class' => 'col-sm-2 form-control')) }}
            @endif
      		</div>
        </div>

        <!-- Submit !-->
        <div class="form-group col-sm-12">
        	<div class="col-sm-6">
            @if(!empty($alum))
                {{form::submit('Guardar Cambios',array('class'=>'btn btn-success col-sm-4'))}}
                {{ HTML::link('matriculas/matriculados', 'Cancelar', array('class'=>'btn btn-danger col-sm-4'));}}
            @else
        		    {{form::submit('Guardar Matricula',array('class'=>'btn btn-success col-sm-4'))}}    
            @endif
          </div>
        </div>
        @if(isset($alum))
          {{ Form::hidden('papa',$alum['papa'], array('id' => 'papa')) }}
        @else
          {{ Form::hidden('papa',null, array('id' => 'papa')) }}
        @endif

        @if(isset($alum))
          {{ Form::hidden('mama',$alum['mama'], array('id' => 'mama')) }}
        @else
          {{ Form::hidden('mama',null, array('id' => 'mama')) }}
        @endif
        
        @if(isset($alum))
          {{ Form::hidden('acudiente',$alum['alumnos_acudiente'], array('id' => 'acudiente')) }}
        @else
          {{ Form::hidden('acudiente',null, array('id' => 'acudiente')) }}
        @endif
    {{Form::close()}}
@stop

@section('scripts') 
  {{ HTML::script('js/scripts/matriculas/matriculas.js') }}
@stop