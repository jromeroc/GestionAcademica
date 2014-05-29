<?php

class DocsMatriculaController extends Controller
{
	public $_legalizar;



	public function __construct(){
		$this->_legalizar = new Legalizar();
	}

	public function request_pagare($idP,$idM){
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
		$valorAnual = 'cientos';
		$valorNumeroAnual = '100s';
		$valorMatricula = 'cadena valor matricula';
		$valornumeroMatricula = '3000000';
		$grado = 'grado';
		$valorLetrasTotPension = 'millones';
		$valorTotPension = 'mas millones';
		$valorLetraMensualPension = 'Millones mensuales';
		$valorPension = 'mensual pension';
		$valorLetrasCuotaUnik = 'unikca';
		$valorCuotaUnik = 'valo Unikkkk';
		$doc = View::Make('documentos.Matriculas.Pagare_Contacto')->with(array('papa'=>$padre,'mama'=>$madre,'presidente'=>$presidente));
		return PDF::load($doc, 'carta', 'portrait')->show();
	}

	public function request_Enfermeria(){
		$info = array('dato'=>'1');
		$doc = View::Make('documentos.Matriculas.enfermeria')->with(array('dato'=>$dato));
		return PDF::load($doc, 'carta', 'portrait')->show();
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