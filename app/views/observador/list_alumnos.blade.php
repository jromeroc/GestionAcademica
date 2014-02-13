<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>Sel</th>
			<th>Id Alumno</th>
			<th>Nombres</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			@foreach ($lista as $list)
			<td>
				{{Form::checkbox('name', 'value');}}
			</td>
				{{$list->names}}
			<td>
				{{$list->value}}
			</td>

			<td>
				
			</td>
			@endforeach
		</tr>
	</tbody>
</table>