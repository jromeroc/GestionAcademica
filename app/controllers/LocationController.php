<?php

class LocationController extends BaseController
{
	public $errors;

	public function __construct()
	{
		$this->$_location = new Location();
		
	}

	public function searchPais(){
		if(Input::get('term'))
		{
			$found = $this->autoCompletepais(Input::get('term'));
			return Response::json($found);
		}
	}
	public function searchPity(){
		if(Input::get('term'))
		{
			$found = $this->autoCompleteciudad(Input::get('term'));
			return Response::json($found);
		}
	}
}