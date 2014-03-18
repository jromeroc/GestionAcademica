<?php

class LocationController extends BaseController
{
	public $errors;

		

	public function autocompletarpais()
	{
		$location = new Location();
		if(Input::get('term'))
		{
			$found = $location->autocompletarpais(Input::get('term'));
			return Response::json($found);
		}
	}

	public function autocompletarciudad()
	{
		$location = new Location();
		if(Input::get('term'))
		{
			$found = $location->autocompletarciudad(Input::get('term'),Input::get('country'));
			return Response::json($found);
		}
	}
	public function autocompletarciudadU()
	{
		$location = new Location();
		if(Input::get('term'))
		{
			$found = $location->autocompletarciudadU(Input::get('term'));
			return Response::json($found);
		}
	}
}