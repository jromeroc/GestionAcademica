<?php

class ObservadorController extends BaseController
{
	public $errors;
	public $_observador;


	public function __construct()
	{
		$this->_observador = new Observador();
	}


	public function index()
	{
      	return View::make("observador.index");
	}

	public function nuevo()
	{
		$grupos = Grupo::all()->lists('nombre','id');
        
        if(Input::get())
		{
			$data = Input::all();
			$reglas = array(
				'grupo' 		=>  'required|numeric',
				'fecha' 		=>  'required',
				'descripcion' 	=>  'required',
				'id_docente' 	=>  'required|numeric'
			);
			$mensajes = array(
				'required' 	=> 'El campo :attribute es requerido.',
				'numeric' 	=> 'Se esperaba un valor numerico en el campo :attribute.');

			$validacion = Validator::make($data,$reglas,$mensajes);

			if ($validacion->fails()) 
			{
				return Redirect::to('observador/nuevo')->withInput()->withErrors($validacion);
			}
			else
			{	
				$this->_observador->fill($data);
				$this->_observador->save();
				return Redirect::to('observador/informe');
			}
		}else
		{
			return View::make('observador.nuevo')->with(array('observador'=> $this->_observador,'grupos' => $grupos));
		}

	}

	public function informe()
	{
		$observador = Observador::paginate();
        return View::make('observador/list')->with('observaciones', $observador);
	}

	public function save()
	{
		
	}

	public function show($id)
	{
		return View::make('observador.show')->with('observacion', $observador);
	}

	public function edit($id)
	{
		$observador = Observador::find($id);
		if (is_null ($observador))
		{
			App::abort(404);
		}
		return View::make('observador.edit')->with('observacion', $observador);
	}

	public function update($id)
	{
		//Actualizar Observacion
	}

	public function destroy($id)
	{
		//Eliminar Observacion
	}

	public function isValid($data)
    {
        $rules = array(
            'grupo' => 'required|numeric',
            'docente'=>'required|numeric',
            'fecha' => 'required',
            'descripcion' => 'required',
        );

        $validator = Validator::make($data, $rules);

        if ($validator->passes())
        {
            return true;
        }

        else
        {

        $this->errors = $validator->errors();
        return false;
        }

        }

}