<?php

class DocsMatriculaController extends Controller
{

	public function request_document($type=2){
		switch ($type) {
			case 1:
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
			break;

			case 2:
				$doc = View::make('documentos.Matriculas.enfermeria');
				return PDF::load($doc, 'carta', 'portrait')->show();
			break;

			case 3:
				$doc = $this->_pagare->printDocs();
			break;

			case 4:
				$doc = $this->_pagare->printDocs();
			break;

			default:
				$doc = $this->_pagare->printDocs();
			break;
		}
	}


	
}