<?php

class ObservadorController extends BaseController
{
	public function index()
	{
      	return View::make("observador.index");
	}

	public function nuevo()
	{
      	return View::make("observador.nuevo");
	}

	public function informe()
	{
		return View::make('observador.list');
	}

	public function save()
	{
		/*
		return Input::All();
		*/
        
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $observador = new Observador;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($observador->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $observador->fill($data);
            // Guardamos el usuario
            $observador->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('observador.lista', array($observador->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::route('observador.nueva')->withInput()->withErrors($observador->errors);
        }
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

}