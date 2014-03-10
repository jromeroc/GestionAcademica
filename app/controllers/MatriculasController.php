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
		return View::Make('matriculas.alum')->with('años',$años);
	}

	public function nuevo(){
		return "Hola mundo";
	}

	public function searchalum($year){
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoComplete(Input::get('term'),$year);
			return Response::json($found);
		}
	}

}

?>