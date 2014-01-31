<?php

class MateriasController extends BaseController
{
	
	public function buscar()
	{
		$materias = new Materia;
		if(Input::get('term'))
		{
			$found = $materias->autoComplete(Input::get('term'));
			return Response::json($found);
		}
	}
}

?>