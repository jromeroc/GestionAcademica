<?php

class DocsMatriculaController extends Controller
{
	public $_legalizar;



	public function __construct(){
		$this->_legalizar = new Legalizar();
	}

	public function requestContrato($idP,$idM){

		$pdf = App::make('dompdf');
		$padre = $this->_legalizar->srchDataPadre($idP);
		$padre = get_object_vars($padre[0]);
		$madre = $this->_legalizar->srchDataPadre($idM);
		$madre = get_object_vars($madre[0]);
		$presidente = "Nombre presidente";
		$indentification = "Num doc presidente";
		$signoFather = 'Nombre papa';
		$signoMother = 'Nombre mama';
		$nameSons = 'Nombres de los hijos';// preguntar si es uno o todos los hijos
		$yearLectivo = "2014 - 2015";
		$gradoALumno = 'grado alumno';
		$grado = 'grado';
		
		$doc = View::Make('documentos.Matriculas.contrato')->with(array('papa'=>$padre,'mama'=>$madre,'presidente'=>$presidente));
		$pdf->loadHTML($doc)->setPaper('a4');
		return $pdf->stream();
	}

	public function request_Enfermeria(){
		$info = array('dato'=>'1');
		$doc = View::Make('documentos.Matriculas.enfermeria')->with(array('dato'=>$dato));
		$pdf->loadHTML($doc)->setPaper('a4');
		return $pdf->stream();
	}

	public function request_Contabilidad(){
		$doc = View::Make('documentos.Matriculas.contabilidad');
		return PDF::load($doc, 'carta', 'portrait')->show();
	}

	public function request_Matricula(){
		$doc = View::Make('documentos.Matriculas.matricula');
		return PDF::load($doc, 'carta', 'portrait')->show();
	}

	
}