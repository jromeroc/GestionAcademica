<?php

class AlumnosController extends BaseController
{
	public $errors;
	public $_alumnos;


	public function __construct()
	{
		$this->_alumnos = new Alumnos();
	}
	
	public function autocompletar()
	{
		if(Input::get('term'))
		{
			$found = $this->_alumnos->autocompletar(Input::get('term'));
			return Response::json($found);
		}
	}	
}