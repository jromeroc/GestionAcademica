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
				'alum'					=>	'required',
				'fname'					=>	'required',
				'year_matricula'		=>	'required',
				'genero'				=>	'required',
				'grado'					=>	'required'
			);
			$mensajes = array(
					'alum.required'			 	=> 'Digite el nombre del alumno.',
					'fname.required' 			=> 'Digite el apellido del alumno.',
					'year_matricula.required' 	=> 'Seleccione un año Escolar.',
					'genero.required' 			=> 'Seleccione un genero.',					
					'grado.required' 			=> 'Seleccione un grado.'				
			);
			if (Input::get('T-reg')==1) {
				$reglas['fecha_matricula'] = 'required';
				$mensajes['fecha_matricula.required'] = 'Seleccione la fecha de la matricula.';
				$tabla = $this->asignTabla($data['year_matricula']);
				$codigoMatri = $this->_matricula->cod_matri($tabla);
				$codigoMatri = $codigoMatri +1;
			}

			$validacion = Validator::make($data,$reglas,$mensajes);
			
			if ($validacion->fails()) 
			{
				return Redirect::to('matriculas/')->withInput()->withErrors($validacion)->with(array('datos'=>$data));
			}
			else
			{
				$tabla = $this->asignTabla($data['year_matricula']);
				
				$data['codigoMatri']=$codigoMatri;
				$save = $this->_matricula->saveMatricula($data,$tabla);
				return Redirect::to('matriculas/');
			}
		}
	}
	public function searchalum($year){
		$tabla = $this->asignTabla($year);
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoCompletename(Input::get('term'),$year,$tabla);
			return Response::json($found);
		}
	}
	public function asignTabla($year){
			switch ($year)
			{
	    		case ($year = date('Y'))&&(date('m')<=7):
			        $tablaAlumnos = "alumnos_last";
			        break;
	    		case $year < date('Y'):
			        $tablaAlumnos = "alumnos_fecha";
			        break;
	    		case ($year > date('Y'))&&(date('m')>=8):
			        $tablaAlumnos = "alumnos";
			        break;
			}
			return $tablaAlumnos;
		}
	
}


?>