<?php

class AdministracionController extends BaseController
{
	public function index()
	{
		return View::make('logros.logros');
	}
}

?>