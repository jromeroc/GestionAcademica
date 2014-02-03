<?php

class CargaAcademicaController extends BaseController
{

	public $errors;
	public $_carga;

	public function __construct()
	{
		$this->_carga = new CargaAcademica();
	}

	public function create()
	{
		$grupos = Grupo::all()->lists('nombre','id');

		if(Input::get())
		{
			$data = Input::all();
			
			if ($this->isValid($data)) 
			{
				$this->_carga->fill($data);
				$this->_carga->save();
				return Redirect::to('carga_academica/informes');
			}
			else
			{	
				return Redirect::to('carga_academica/nuevo')->withInput()->withErrors(
					array('grupo' => 'Seleccione un grado.',
					'materia' => 'Debe seleccionar una materia.',
					'ih' => 'Debe indicar un valor númerico.'));
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

	public function assign($id)
	{
		$infoCarga = $this->_carga->infoCarga($id);
		return View::make('carga.assign')->with(array('infoCarga' => $infoCarga, 'cargaAssign' =>$this->_carga));
	}

	public function report()
	{
		return View::make('carga.informes')
			->with(array('list' => $this->_carga->reportCarga()));
	}

	public function isValid($data)
	{
		$rules = array(
           	'grupo' => 'required|numeric',
    	    'materia' => 'required',
            'ih' => 'required|numeric');

		$validator = Validator::make($data, $rules);

		if($validator->passes())
		{
			return true;
		}

		return false;
	}

}