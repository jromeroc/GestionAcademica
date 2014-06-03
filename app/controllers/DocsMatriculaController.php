<?php

class DocsMatriculaController extends Controller
{
	public $_legalizar;
	public $_matricula;

	public function __construct(){
		$this->_legalizar = new Legalizar();
		$this->_matricula = new MatriculasController();
	}

	public function requestDocs($idP,$idM,$year){

		$pdf = App::make('dompdf');
		$presidente = "Nombre presidente";
		$indentification = "Num doc presidente";
		$yearLectivo = "2014 - 2015";

		$padre = $this->_legalizar->srchDataPadre($idP);
		$padre = get_object_vars($padre[0]);
		$madre = $this->_legalizar->srchDataPadre($idM);
		$madre = get_object_vars($madre[0]);
		
		$type = Input::get('doc');

		$tabla = $this->_matricula->asignTabla($year);
		$hijos = $this->_legalizar->srch_hijos($idP, $idM, $tabla);
		
		foreach ($hijos as $hijo) {
			$son[] = get_object_vars($hijo);
		}	
		
		if($type == 1){
			
			$view = View::Make('documentos.Matriculas.contrato')->with(
				array('firma'=>$type,
					'papa'=>$padre,
					'mama'=>$madre,
					'presidente'=>$presidente,
					'hijos'=>$son));

			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 2){
			$view = View::Make('documentos.Matriculas.pagare')->with(
				array('papa'=>$padre,
					'mama'=>$madre,
					'hijos'=>$son,
					'firma' => Input::get('firma')));

			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 3){
			$doc = View::Make('documentos.Matriculas.contabilidad');
			$pdf->loadHTML($doc)->setPaper('legal');
			return $pdf->stream();
		}
		if($type == 4){
			$info = array('dato'=>'1');
			$doc = View::Make('documentos.Matriculas.enfermeria')->with(array('dato'=>$dato));
			$pdf->loadHTML($doc)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 5){
			$pdf->loadHTML('<html><h1>Matricula</h1></html>')->setPaper('a4');
			return $pdf->stream();
		}
	}
}