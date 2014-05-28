<?php

class DocsMatriculaController extends Controller
{

	public function request_pagare(){
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
		$doc = View::Make('documentos.Matriculas.Pagare_Contacto')->with(array('presidente'=>$presidente));
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