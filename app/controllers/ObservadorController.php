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
		//
		
		//
		$grupos = Grupo::all()->lists('nombre','id');
		//--|  |--\\
        //$grupos = array_unshift($grupos,'Seleccione-Grupo');
        if(Input::get())
		{
			$data = Input::all();
			$reglas = array(
				'grupo' 		=>  'required|numeric',
				'fecha' 		=>  'required',
				'descripcion' 	=>  'required',
				'id_docente' 	=>  'required'
			);

			$mensajes = array(
					'required' => 'El campo :attribute es requerido.',
					'id_docente.required' => 'Por favor seleccione un docente',
					'numeric' => 'Se esperaba un valor numerico en el campo :attribute.'
			);
			
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
		$observador = Observador::find($id);
		if (is_null ($observador))
			{
				App::abort(404);
			}
		return View::make('observador.show')->with('Observacion',$observador);
	}

	public function edit($id)
	{
		$grupos = Grupo::all()->lists('nombre','id');
		$observador = Observador::find($id);
		if (is_null ($observador))
		{
			App::abort(404);
		}
		return View::make('observador.edit')->with(array('Observacion'=> $this->_observador,'grupos' => $grupos));
	}

	public function update($id)
	{
		//Actualizar Observacion
		// Creamos un nuevo objeto para nuestro nuevo usuario
        $observador = Observador::find($id);
        
        // Si el usuario no existe entonces lanzamos un error 404 :(
        if (is_null ($observador))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válido
        if ($user->isValid($data))
        {
            // Si la data es valida se la asignamos al usuario
            $user->fill($data);
            // Guardamos el usuario
            $user->save();
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('observador.show', array($user->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('observador.edit', $user->id)->withInput()->withErrors($user->errors);
        }
	}

	public function destroy($id)
	{
		//Eliminar Observacion
		$this->_observador->destroy($id);
		return Redirect::to('observador/informe');
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

    public function buscar()
	{
		$docente = new Docentes;
		if(Input::get('term'))
		{
			$found = $materias->autoComplete(Input::get('term'));
			return Response::json($found);
		}
	}

	public function listGrupo($grupo)
	{
		$alumnos = new Alumnos;
		$lista = $alumnos->listAlumGrupo($grupo);
		return View::make('observador.listalumnos', array('lista'=>$lista));
	}
}
?>