<?php

class LegalizarController extends BaseController
{
	public function index()
	{
		return View::Make('legalizacion.principal');
	}

	public function pendientes()
	{
		return View::Make('legalizacion.pendientes');
	}

	public function legalizadas()
	{
		return View::Make('legalizacion.legalizadas');	
	}
}

?>