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
		$años = array();
		$month = date("m");
		$Year;
		if ($month > 7) {
			$Year=date('y')+1;
		}
		elseif ($month < 8) {
			$Year=date('Y');
		}
		elseif(){

		}
		echo "Mes actual: $month <br> Año: $Year ";
		return View::Make('matriculas.alum')->with('año',$Year);
	}

	public function nuevo(){
		return "Hola mundo".$año;
	}
}

?>