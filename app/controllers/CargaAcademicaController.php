<?php

class CargaAcademicaController extends BaseController
{

	public $errors;
	public $_carga;

	public function __construct()
	{
		$this->_carga = new CargaAcademica();
	}

	public function informe()
	{
		return View::make('carga.informes')
			->with(array('list' => $this->_carga->reportCarga()));
	}

	public function nuevo()
	{
		$grupos = Grupo::all()->lists('nombre','id');

		if(Input::get())
		{
			$data = Input::all();
			$reglas = array(
				'grupo' =>  'required|numeric',
				'materia' =>  'required|numeric',
				'ih' =>  'required|numeric'
			);
			$mensajes = array(
					'materia.required' => 'Debe selecionar una materia de la lista.',
					'materia.numeric' => 'Debe selecionar una materia de la lista.',
					'ih.required' => 'Debe ingresar la intensidad horaria.',
					'required' => 'El campo :attribute es requerido.',
					'numeric' => 'Se esperaba un valor numerico en el campo :attribute.');

			$validacion = Validator::make($data,$reglas,$mensajes);

			if ($validacion->fails()) 
			{
				return Redirect::to('carga_academica/nuevo')->withInput()->withErrors($validacion);
			}
			else
			{	
				$this->_carga->fill($data);
				$this->_carga->save();
				return Redirect::to('carga_academica/informes');
			}
		}else
		{
			return View::make('carga.nuevo')->with(array('carga'=> $this->_carga,'grupos' => $grupos));
		}
	}

	public function edit($id)
	{
		$grupos = Grupo::all()->lists('nombre','id');
		$carga = $this->_carga->infoCarga($id);
		
		if (is_null($carga))
		{
			return "error";
		}
		
		return View::make('carga.editar')->with(array('carga' => $carga, 'grupos' => $grupos));
	}

	public function delete($id)
	{
		$this->_carga->destroy($id);
		return Redirect::to('carga_academica/informes');
	}

	public function asignar ($id)
	{	
		$periodos = Periodos::all()->lists('nombre_periodo','id');
		$infoCarga = $this->_carga->infoCarga($id);
		return View::make('carga.asignar')->with(array('infoCarga' => $infoCarga, 'cargaAssign' =>$this->_carga, 'listperiodo' => $periodos));
	}
}