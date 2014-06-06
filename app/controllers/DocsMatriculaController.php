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
		
		$type = Input::get('doc');
		$typeFirma = Input::get('firma');

		if($typeFirma == 1 || $typeFirma == 3)
		{
			$padre = $this->_legalizar->srchDataPadre($idP);
			$padres['papa'] = get_object_vars($padre[0]);
		}
		if($typeFirma == 2 || $typeFirma == 3)
		{
			$madre = $this->_legalizar->srchDataPadre($idM);
			$padres['mama'] = get_object_vars($madre[0]);
		}

		$tabla = $this->_matricula->asignTabla($year);
		$hijos = $this->_legalizar->srch_hijos($idP, $idM, $tabla);
		
		foreach ($hijos as $hijo) {
			$son[] = get_object_vars($hijo);
		}	

		if($type == 1){
			$view = View::Make('documentos.Matriculas.contrato')->with(
				array('firma'=>$typeFirma,
					'padres'=>$padres,
					'presidente'=>$presidente,
					'hijos'=>$son));
			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 2){
			$view = View::Make('documentos.Matriculas.pagare')->with(
				array('padres'=>$padres,
					'hijos'=>$son,
					'firma'=>$typeFirma));

			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 3){
			$view = View::Make('documentos.Matriculas.contabilidad')->with(
				array('padres'=>$padres,
					'hijos'=>$son,
					'firma'=>$typeFirma));
			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 4){
			$view = View::Make('documentos.Matriculas.enfermeria');
			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
		if($type == 5){
			$view = '<html><h1>Matricula</h1></html>';
			$pdf->loadHTML($view)->setPaper('a4');
			return $pdf->stream();
		}
	}
}