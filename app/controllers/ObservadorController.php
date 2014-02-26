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
				'alums'			=>	'required',
				'grupo' 		=>  'required|numeric',
				'fecha' 		=>  'required',
				'descripcion' 	=>  'required',
				'id_docente' 	=>  'required'
			);

			$mensajes = array(
					'required' => 'El campo :attribute es requerido.',
					'id_docente.required' => 'Por favor seleccione un docente',
					'numeric' => 'Se esperaba un valor numerico en el campo :attribute.',
					'alums.required'=> 'No ha seleccionado ningun alumnos, revise el listado'
			);
				
			
			$validacion = Validator::make($data,$reglas,$mensajes);
			
			if ($validacion->fails()) 
			{
				return Redirect::to('observador/nuevo')->withInput()->withErrors($validacion)->with(array('datos'=>$data));
			}
			else
			{
				//Asignar y guardar
				$this->_observador->fill($data);
				$this->_observador->save();
				//asignaciones
					//Obtener ID del registro
						$fecha_ob = $data['fecha'];
						$doc_ob = $data['id_docente'];
						$descrip_ob = $data['descripcion'];
						//Obtener id de la observacion
						$id_registro = $this->_observador->get_Id($fecha_ob,$doc_ob,$descrip_ob);
						$id_registro = $id_registro->id;				
						foreach ($data['alums'] as $alumno) {
							$this->_observador->save_map($id_registro,$alumno);
						};
								
				return Redirect::to('observador/informe');
			}
		}

		else
		{
			return View::make('observador.nuevo')->with(array('observador'=> $this->_observador,'grupos' => $grupos));
		}


	}

	public function informe()
	{
		$observador = Observador::paginate();
		$consulta = $this->_observador->selectobsv();
        return View::make('observador/list')->with(array('observaciones'=>$observador,'datos'=>$consulta));
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
		$i=0;
		$consultaob = $this->_observador->findObsv($id);
		$alumnos=$this->_observador->findAlumns($id);
		$grupos = Grupo::all()->lists('nombre','id');
		$observador = Observador::find($id);
		if (is_null ($observador))
		{
			App::abort(404);
		}

		$alumSelect = array();
		foreach ($alumnos as $key => $value) {
			$alumSelect[] = ($value->id_alumno);
			
		}

		return View::make('observador.edit')->with(array('Observacion'=> $this->_observador,'grupos' => $grupos,'datos'=>$consultaob,'alums'=>$alumSelect));
	}

	public function update($id)
	{
		//Actualizar Observacion
		// Creamos un nuevo objeto para nuestra observacion
        $observador = Observador::find($id);
        
        // Si la observacion no existe entonces lanzamos un error 404 :(
        if (is_null ($observador))
        {
            App::abort(404);
        }
        
        // Obtenemos la data enviada por el usuario
        $data = Input::all();
        
        // Revisamos si la data es válida
        if ($data->isValid($data))
        {
            // Si la data es valida se la asignamos al observacion
            $data->fill($data);
            // Guardamos el observacion
            $data->save();
            // Y Devolvemos una redirección a la acción show para mostrar la observacion
            return Redirect::route('observador.show', array($data->id));
        }
        else
        {
            // En caso de error regresa a la acción edit con los datos y los errores encontrados
            return Redirect::route('observador.edit', $data->id)->withInput()->withErrors($data->errors);
        }
	}

	public function destroy($id,$idalumn)
	{
		//Eliminar Observacion
		$this->_observador->delete_map($id,$idalumn);
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