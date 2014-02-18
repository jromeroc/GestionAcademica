@extends('layouts.master')

@section('title')
@parent
.:: Observador ::.
@stop


<pre>
	<?php
		print_r($lista);
	?>	
</pre>

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
			<td>
				{{Form::checkbox('name', 'value');}}
			</td>
				{{--{{$lista->id}}--}}
			<td>
				{{--{{$lista->value}}--}}
			</td>

			<td>
			</td>
			
		</tr>
	</tbody>
</table>
