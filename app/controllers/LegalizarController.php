<?php

class LegalizarController extends BaseController
{
	public $_legalizar;
	public $_matricula;

	public function __construct()
	{
		$this->_legalizar = new Legalizar();
		$this->_matricula = new MatriculasController();
	}

	public function index()
	{
		return View::Make('legalizacion.principal');
	}

	public function pendientes()
	{
		$this->listado(0);

	}

	public function legalizadas()
	{
		$this->listado(1);
	}

	private function listado($type)
	{
		$anos = $this->_matricula->asign_year();
		return View::Make('legalizacion.pendientes')->with(array('anos' => $anos));
	}

	public function matriculasPendientes()
	{
		$anos = $this->_matricula->asign_year();
		$data = Input::all();
		$tabla = $this->_matricula->asignTabla($data['year_matricula']);
		if (!empty($data['year_matricula']))
		{
			$alums = $this->_legalizar->matriculasPendientes($tabla);
			if (!empty($data['name_alum']))
			{
				$alums = $this->_legalizar->matriculasPendientesY_A($tabla,$data['name_alum']);
			}
		}
		return View::Make('legalizacion.pendientes')->with(array('alums'=>$alums,'anos' => $anos,'data'=>$data));
	}

	public function matriculasLegalizadas()
	{
		$anos = $this->_matricula->asign_year();
		$data = Input::all();
		$tabla = $this->_matricula->asignTabla($data['year_matricula']);
		if (!empty($data['year_matricula']))
		{
			$alums = $this->_legalizar->matriculasLegalizadas($tabla);
			if (!empty($data['name_alum']))
			{
				$alums = $this->_legalizar->matriculasLegalizadasY_A($tabla,$data['name_alum']);
			}
		}
		return View::Make('legalizacion.legalizadas')->with(array('alums'=>$alums,'anos' => $anos,'data'=>$data));
	}

	public function asignTabla($year){

			if ($year == date('Y') && (date('m')<=7))
			{
				$tablaAlumnos = "alumnos";
			}

			elseif($year < date('Y'))
			{
				$tablaAlumnos = "alumnos_last";
			}

			elseif($year == date('Y') && (date('m')>=8))
			{
				$tablaAlumnos = "alumnos_next";
			}

			elseif($year > date('Y') && (date('m')<=7))
			{
				$tablaAlumnos = "alumnos_next";
			}

			return $tablaAlumnos;
		}
}

?>
