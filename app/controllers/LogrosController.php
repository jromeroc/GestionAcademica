<?php

class LogrosController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('logros.logros');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Input::get())
		{

		 	//$userdata = array(
	        //    'nick' => Input::get('username'),
	        //    'password' => Input::get('password')
        	//);

	        $rules = array(
	            'orden'  => 'required|numeric',
	            'periodo'  => 'required',
	            'desc'  => 'required'
	        );

        	// Valida los campos del formulario.
        	$validator = Validator::make(Input::all(), $rules);

			var_dump(Input::all());
			
			if($validator->passes())
			{
				
				//if($post->save())
				//{
				//	return Redirect::to('logros');
				//}
			}
			else
			{
				return Redirect::to('logros/nuevo')->withErrors($validator);
			}
		}
		else
		{
			return View::make('logros.nuevo');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}