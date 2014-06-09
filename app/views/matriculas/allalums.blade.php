		<br>
		<table class="table table-bordered table-hover">
			<thead>
				<tr class="info">
					<th> Cod. Matricula 	</th>
					<th> Grado				</th>
					<th> Primer Apellido	</th>
					<th> Segundo Apellido	</th>
					<th> Nombres			</th>
					<th> Editar				</th>
				</tr>
			</thead>
					
			<tbody>
				@foreach ($alumnos as $alums)
				<tr>
					<td> {{$alums->matricula}} </td>
					<td> {{$alums->Grado}} </td>
					<td> {{$alums->fname}} </td>
					<td> {{$alums->lname}} </td>
					<td> {{$alums->names}} </td>
					<td>
				   		{{ HTML::link('matriculas/editar_matricula/'.$alums->id.'/'.$año, 'Alumno', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('matriculas/editar_papa/'.$alums->id.'/'.$año.'/1', 'Papá', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('matriculas/editar_mama/'.$alums->id.'/'.$año.'/0', 'Mamá', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('matriculas/editar_acudiente/'.$alums->id.'/'.$año, 'Acudiente', array('class'=>'btn btn-primary'));}}
				   		{{ HTML::link('matriculas/cancel_matricula/'.$alums->id.'/'.$año, 'Cancelar Matricula', array('class'=>'btn btn-danger'));}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br>
		{{$alumnos->appends(array('name_alum' => $data['name_alum'],'Grados' => $data['Grados'],'year_matricula'=>$data['year_matricula']))->links()}}
		</div>
	</div>
		
