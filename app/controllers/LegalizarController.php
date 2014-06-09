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

		$year = date('Y');
		$tabla = $this->_matricula->asignTabla($year);

		$data = Input::all();

		if(isset($data['year_matricula'])){
			$year = $data['year_matricula'];
			$tabla = $this->_matricula->asignTabla($year);
		}
		$list = $this->_legalizar->listMatriculas($tabla,$type);
		$anos = $this->_matricula->asign_year();
		return View::Make('legalizacion.list')->with(array('family' => $list, 'type' => $type, 'anos' => $anos, 'year' => $year));
	}

	public function legalizar($idP,$idM,$ano){
		$tabla = $this->_matricula->asignTabla($ano);
		$papa = $this->_legalizar->srch_padre($idP);
		$papa = get_object_vars($papa[0]);
		$mama = $this->_legalizar->srch_padre($idM);
		$mama = get_object_vars($mama[0]);

		$hijos = $this->_legalizar->srch_hijos($idP,$idM,$tabla);
		foreach ($hijos as $infoHijo) {
			$hijo[] = get_object_vars($infoHijo);
		}
		return View::Make('legalizacion.legalizar')->with(array('papa'=>$papa,'mama'=>$mama,'hijo'=>$hijo,'year'=>$ano));
	}
	public function legalizarM($idP,$idM,$ano){
		$tabla = $this->_matricula->asignTabla($ano);
		$update = $this->_legalizar->LegalizarMatricula($idP,$idM,$tabla);
		return Redirect::to('legalizacion');
	}
}

?>
