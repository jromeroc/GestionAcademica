<?php

class LegalizarController extends BaseController
{
	public $_legalizar;
	public $_matricula;
	private $_typeList;

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
		return $this->listado(0);
	}

	public function legalizadas()
	{
		return $this->listado(1);
	}

	private function listado($type)
	{
		$anos = $this->_matricula->asign_year();
		return View::Make('legalizacion.list')->with(array('anos' => $anos, 'type' => $type));
	}

	public function matriculasList($type)
	{
		$this->_typeList = $type;
		return $this->filtroMatriculas();
	}

	public function filtroMatriculas()
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
		return View::Make('legalizacion.list')->with(array('alums'=>$alums,'anos' => $anos,'data'=>$data));
	}
}

?>
