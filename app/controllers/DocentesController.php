<?php

class DocentesController extends BaseController
{
	public function autocompletar()
	{
		$buscar = new Docentes();
		if(Input::get('term'))
		{
			$found = $buscar->autocomplete(Input::get('term'));
			return Response::json($found);
		}
	}
}
?>