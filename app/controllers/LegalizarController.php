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

		$tabla = $this->_matricula->asignTabla(date('Y'));

		$data = Input::all();

		if(isset($data['year_matricula'])){
			$tabla = $this->_matricula->asignTabla($data['year_matricula']);
		}

		$list = $this->_legalizar->listMatriculas($tabla,$type);
		$anos = $this->_matricula->asign_year();
		return View::Make('legalizacion.list')->with(array('family' => $list, 'type' => $type, 'anos' => $anos));
	}

	public function legalizar(){
		return View::Make('legalizacion.legalizar');
	}
}

?>
