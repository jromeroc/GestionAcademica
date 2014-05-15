<?php

class LegalizarController extends BaseController
{
	public $_Legalizar;
	public $_Matricula;

	public function __construct()
	{
		$this->_Legalizar = new Legalizar();
		$this->_Matricula = new MatriculasController();
	}

	public function index()
	{
		return View::Make('legalizacion.principal');
	}

	public function pendientes()
	{
		$años = $this->_Matricula->asign_year();		
		return View::Make('legalizacion.pendientes')->with(array('años' => $años));
	}

	public function legalizadas()
	{
		$años = $this->_Matricula->asign_year();	
		return View::Make('legalizacion.legalizadas')->with(array('años' => $años));
	}

	public function srchMatriculasPendientes()
	{
		$años = $this->_Matricula->asign_year();	
		$data = Input::all();
		$tabla = $this->_Matricula->asignTabla($data['year_matricula']);
		if (!empty($data['year_matricula'])) 
		{
			$alums = $this->_Legalizar->srchMatriculasPendientes($tabla);
			if (!empty($data['name_alum'])) 
			{
				$alums = $this->_Legalizar->srchMatriculasPendientesY_A($$tabla,$data['name_alum']);
			}
		}
		return View::Make('legalizacion.pendientes')->with(array('alums'=>$alums,'años' => $años,'data'=>$data));	
	}	

	public function srchMatriculasLegalizadas()
	{
		$años = $this->_Matricula->asign_year();	
		$data = Input::all();
		$tabla = $this->_Matricula->asignTabla($data['year_matricula']);
		if (!empty($data['year_matricula'])) 
		{
			$alums = $this->_Legalizar->srchMatriculasLegalizadas($tabla);
			if (!empty($data['name_alum'])) 
			{
				$alums = $this->_Legalizar->srchMatriculasLegalizadasY_A($tabla,$data['name_alum']);
			}
		}
		return View::Make('legalizacion.legalizadas')->with(array('alums'=>$alums,'años' => $años,'data'=>$data));	
	}


}

?>