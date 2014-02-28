<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>{{Form::checkbox('select_all','0',false,array('id'=>'select_all'))}} Seleccionar todos</th>
		</tr>
	</thead>
	<tbody>
		@foreach($lista as $alumnos)
		<tr>
			<td>
			@if(in_array($alumnos->id_alum, $alums))
				{{Form::checkbox('alums[]',$alumnos->id_alum,true,array('class'=>'ck'))}}
			@else
				{{Form::checkbox('alums[]',$alumnos->id_alum,false,array('class'=>'ck'))}}
			@endif
			{{$alumnos->value}}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@section('scripts')
  {{HTML::script('js/bootstrap.js')}}
  {{HTML::script('js/general.js')}}
  {{HTML::script('js/jquery-1.11.0.js')}}
  {{HTML::script('js/bootstrap.min.js')}}
@stop