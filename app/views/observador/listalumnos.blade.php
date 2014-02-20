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
				{{Form::checkbox('alums[]', $alumnos->id_alum,false,array('class'=>'ck'))}}
				{{$alumnos->value}}
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
