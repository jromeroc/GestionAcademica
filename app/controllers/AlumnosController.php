<?php

class AlumnosController extends BaseController
{
	public $errors;
	public $_alumnos;


	public function __construct()
	{
		$this->_alumnos = new Alumnos();
	}

	public function listGrupo()
	{
		
	}
}