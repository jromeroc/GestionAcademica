<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Sel</th>
			<th>Id Alumno</th>
			<th>Nombres</th>
		</tr>
	</thead>
	<tbody>
		@foreach($lista as $alumnos)
		<tr>
			<td>
				{{Form::checkbox('name', $alumnos->id_alum)}}
			</td>
			<td>

				{{$alumnos->value}}
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
