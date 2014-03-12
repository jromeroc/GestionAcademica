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
		$grupos = Grupo::all()->lists('nombre','id');
		$observador = Observador::paginate();
		$consulta = $this->_observador->selectobsv();

        return View::make('observador/list')->with(array('observaciones'=>$observador,'datos'=>$consulta,'grupos'=>$grupos));
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
		$grupos = Grupo::all()->lists('nombre','id');
		$observador = Observador::paginate();
		$consulta =$this->_observador->selectobsv();

		if (Input::all()) {
			$data=Input::all();
			
			$consulta = $this->_observador->selectobsv($data['datepickerini'],$data['datepickerfin'],$data['id_alumno']);
		}
        return View::make('observador/list')->with(array('observaciones'=>$observador,'datos'=>$consulta,'grupos'=>$grupos));
		
	}

	public function edit($id)
	{
		$consultaob = $this->_observador->findObsv($id);
		$grupos = Grupo::all()->lists('nombre','id');
		$observador = Observador::find($id);
		if (is_null ($observador))
		{
			App::abort(404);
		}

		return View::make('observador.edit')->with(array('Observacion'=> $this->_observador,'grupos' => $grupos,'datos'=>$consultaob));
	}

	public function update($id)
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
				'numeric' => 'Se esperaba un valor numerico en el campo :attribute.',
				'alums.required'=> 'No ha seleccionado ningun alumno, revise el listado'
			);

		$validacion = Validator::make($data,$reglas,$mensajes);
			
			if ($validacion->fails())
			{
				return Redirect::to('observador/edit/'.$data['id_observacion'])->withInput()->withErrors($validacion);
			}
			else
			{
				//Asignar y guardar
				$this->_observador->fill($data);
					if (Input::get('alums')==NULL)
					{
						
						$idob=Input::get('id_observacion');
						$fecha=$data['fecha'];
						$id_docente=$data['id_docente'];
						$descripcion=$data['descripcion'];
						$grupo=$data['grupo'];
						$guardar=$this->_observador->updateob($idob,$fecha,$id_docente,$descripcion,$grupo);
						return Redirect::to('observador/informe');	
					}
					else{

						$idob=Input::get('id_observacion');
						$fecha=$data['fecha'];
						$id_docente=$data['id_docente'];
						$descripcion=$data['descripcion'];
						$grupo=$data['grupo'];
						$guardar=$this->_observador->updateob($idob,$fecha,$id_docente,$descripcion,$grupo);
						$this->updatealums($idob);
						return Redirect::to('observador/informe');
					}

			}
	}

	public function updatealums($id)
	{
		$data = Input::all();
		
		$idob=Input::get('id_observacion');	
		$alumns = array();															
		$alums=$this->_observador->srch_alumsMap($idob);
		foreach($alums as $array)
			{
			   	foreach ($array as $key) 
			     	{
			           	$alumns[]=$key;
			       	}
			}
			
			$alumsT = $alumns;
			$alumsU = $data['alums'];
			$eliminar = array_diff($alumsT, $alumsU);
			foreach ($eliminar as $borrar_alum) 
				{
					$delete = $this->_observador->up_delete_Map($idob,$borrar_alum);
				}

			$crear = array_diff($alumsU, $alumsT);
			
			foreach ($crear as $añadir_alum) 
				{
					$create = $this->_observador->up_create_Map($idob,$añadir_alum);
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

		$alumnos=$this->_observador->findAlumn(Input::get('id'));
		
		$alumSelect = array();
		foreach ($alumnos as $key => $value) {
			$alumSelect[] = ($value->id_alumno);	
		}

		$alumnosM = new Alumnos;
		$lista = $alumnosM->listAlumGrupo($grupo);
		
		return View::make('observador.listalumnos', array('lista'=>$lista,'alums'=>$alumSelect));
	}
}
?>