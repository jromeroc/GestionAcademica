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
       	/*
		return Input::All();
		*/
        // Obtenemos la data enviada por el usuario
        if(Input::get())
        {
        	$data = Input::all();
	        // Revisamos si la data es válido
	        if ($this->isValid($data))
	        {
	            // Si la data es valida se la asignamos al usuario
        		print_r($data);
	            $observador->fill($data);
	            // Guardamos el usuario
	            $observador->save();
	            // Y Devolvemos una redirección a la acción show para mostrar el usuario
	            return Redirect::route('observador.informe');
	        }
	        else
	        {
	        	return Redirect::to('observador/nuevo')->withInput()->withErrors(
					array('grupo' => 'Seleccione un grado.',
					'docente' => 'El docente debe ser un valor numerico'
					));
	        }
    	}
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return View::make('observador.nuevo')->with(array('observador'=>$this->_observador,'grupos'=>$grupos));
        }

	}

	public function informe()
	{
		return View::make('observador.list');
	}

	public function save()
	{
		
	}

	public function show($id)
	{
		return 'Aqui mostramos la info de la Observacion: ' . $id;
	}

	public function edit($id)
	{
		return 'Aqui editamos la Observacion: ' . $id;
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