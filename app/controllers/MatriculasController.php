<?php

class MatriculasController extends BaseController
{
	public $errors;
	public $_matricula;

	public function __construct()
	{
		$this->_matricula = new Matriculas();
		
	}

	public function MatriculaAlum(){
		
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
		$grados = Grado::all()->lists('nombre','id');
		$month = date("m");
		$year;
		if ($month > 7) {
			$year=date('Y')+1;
		}
		elseif ($month < 8) {
			$year=date('Y');
		}
		$lastY = $year - 1;
		$nextY = $year + 1;

		$años = array("year"=>$year,"lastY"=>$lastY,"nextY"=>$nextY);
		return View::Make('matriculas.alum')->with(array('años' => $años,'tipodoc'=>$tipos,'grado'=>$grados ));
	}

	public function nuevo(){
		if(Input::get())
		{
			$data = Input::all();
			$reglas = array(
				'year_matricula'		=>	'required',
				'fecha_matricula'		=>	'required',
				'tipo_doc'				=>	'required',
				'n_document'			=>	'required',
				'genero'				=>	'required',
				'g_sang'				=>	'required',
				'RH'					=>	'required'
				
			);
			$mensajes = array(
					'year_matricula.required' 	=> 'Seleccione un año Escolar.',
					'fecha_matricula.required' 	=> 'Seleccione la fecha de la matricula.',
					'tipo_doc.required' 		=> 'Seleccione un tipo de documento',
					'n_document.required' 		=> 'Se esperaba un numero de identidad',
					'genero.required' 			=> 'Seleccione un genero.',
					'g_sang.required' 			=> 'Seleccione un grupo sanguineo.',
					'RH.required' 				=> 'Seleccione un RH.'					
			);
				
			
			$validacion = Validator::make($data,$reglas,$mensajes);
			
			if ($validacion->fails()) 
			{
				return Redirect::to('matriculas/')->withInput()->withErrors($validacion)->with(array('datos'=>$data));
			}
			else
			{
				return Redirect::to('www.facebook.com');
			}
		}
	}

	public function searchalum($year){
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoCompletename(Input::get('term'),$year);
			return Response::json($found);
		}
	}
		
}


?>