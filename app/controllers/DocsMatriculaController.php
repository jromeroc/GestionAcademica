<?php

class DocsMatriculaController extends Controller
{
	public $_legalizar;
	public $_matricula;


	public function __construct(){
		$this->_legalizar = new Legalizar();
		$this->_matricula = new MatriculasController();
	}

	public function request_pagare($idM,$idP,$type){

		$pdf = App::make('dompdf');
		$padre = $this->_legalizar->srchDataPadre($idP);
		$padre = get_object_vars($padre[0]);
		$madre = $this->_legalizar->srchDataPadre($idM);
		$madre = get_object_vars($madre[0]);
		$year = date('Y');
		$tabla = $this->_matricula->asignTabla($year);

		$hijo = $this->_legalizar->srch_hijos($padre['id'],$madre['id'],$tabla);
		foreach ($hijo as $hijos) {
			$son[] = get_object_vars($hijos);
		}

		$presidente = "Nombre presidente";
		$indentification = "Num doc presidente";
		$signoFather = 'Nombre papa';
		$signoMother = 'Nombre mama';
		$nameSons = 'Nombres de los hijos';// preguntar si es uno o todos los hijos
		$yearLectivo = "2014 - 2015";
		$gradoALumno = 'grado alumno';
		$grado = 'grado';
		
		$doc = View::Make('documentos.Matriculas.pagare')->with(
			array(
				'firma'=>$type,
				'papa'=>$padre,
				'mama'=>$madre,
				'presidente'=>$presidente,
				'hijos'=>$son
			)
		);
		$pdf->loadHTML($doc)->setPaper('a4');
		return $pdf->stream();
	}

	public function request_contrato($idM,$idP){

		$pdf = App::make('dompdf');
		$padre = $this->_legalizar->srchDataPadre($idP);
		$padre = get_object_vars($padre[0]);
		$madre = $this->_legalizar->srchDataPadre($idM);
		$madre = get_object_vars($madre[0]);
		$year = date('Y');
		$tabla = $this->_matricula->asignTabla($year);

		$hijo = $this->_legalizar->srch_hijos($padre['id'],$madre['id'],$tabla);
		foreach ($hijo as $hijos) {
			$son[] = get_object_vars($hijos);
		}

		$presidente = "Nombre presidente";
		$indentification = "Num doc presidente";
		$signoFather = 'Nombre papa';
		$signoMother = 'Nombre mama';
		$nameSons = 'Nombres de los hijos';// preguntar si es uno o todos los hijos
		$yearLectivo = "2014 - 2015";
		$gradoALumno = 'grado alumno';
		$grado = 'grado';
		
		$doc = View::Make('documentos.Matriculas.contrato')->with(
			array(
				'papa'=>$padre,
				'mama'=>$madre,
				'presidente'=>$presidente,
				'hijos'=>$son
			)
		);
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