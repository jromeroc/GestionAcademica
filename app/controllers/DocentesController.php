<?php

class DocentesController extends BaseController
{
	public function autocompletar()
	{
		$docentes = new Docente();
		return $docentes->autocomplete(Input::get('item');)
	}
}

?>