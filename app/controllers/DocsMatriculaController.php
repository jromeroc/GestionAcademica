<?php

class DocsMatriculaController extends Controller
{
	public function printDocs($father = 0, $mother = 0)
	{

		$html = '<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
				<style>
					h1{
						color:red;
						font-size: 24px;
					}
					table
				</style>
			</head>
			<body>
				<table border=2>
					<tr>
						<th><h1>COLEGIO COLOMBO HEBREO</h1></th>
					</tr>
					<tr>
						<th>PROCESO DE MATRICULA</th>
					</tr>
					<tr>
						<th>CONTRATO DE PRESTACION DE SERVICIOS EDUCATIVOS</th>
					</tr>
				</table>
	            <p>/Entre los suscritos a saber <strong>PresidenteJunta</strong>. 
	            mayor de edad, plenamente capaz, e identificado con cédula de ciudadanía 
	            Nº Docuemtno PresidenteJunta de ciudad exp D.C., obrando como Representante Legal del 
	            COLEGIO COLOMBO HEBREO - BOGOTA D.C., entidad sin ánimo de lucro, 
	            calendario B, con personería jurídica vigente y reconocida mediante la 
	            Resolución 1891 del 28 de junio de1958, expedida por el 
	            Ministerio de justicia y reforma estatutaria según resolución 
	            1578 del 04 de mayo de 2006 expedida por la Secretaría de 
	            Educación Distrital, identificada con el NIT No. 860.006.523-8 , 
	            que funciona actualmente en la Av. Calle 153 No 50 – 65  Suba, 
	            Cundinamarca y que para los efectos del presente contrato en adelante se 
	            denominará <strong>EL COLEGIO</strong>  o por quien legalmente le sustituya  </p>
	        </body>
        </html>';
    	return PDF::load($html, 'carta', 'portrait')->show();
	}
}