<?php

class Legalizar extends Eloquent
{

	public function listMatriculas($tabla, $type, $idalum = 0)
      {
            $addAlum = "";
            if($idalum){
                  $addAlum = "AND $tabla = $idalum"; 
            }

		$consulta = "SELECT 
			CONCAT_WS(' ',padres_cch.`apel1_padre`,padres_cch_A.`apel1_padre`) AS familia,
                  CONCAT_WS(' ',padres_cch.`nombres_padre`,padres_cch.`apel1_padre`,padres_cch.`apel2_padre`) AS namepapa,
                  CONCAT_WS(' ',padres_cch_A.`nombres_padre`,padres_cch_A.`apel1_padre`,padres_cch_A.`apel2_padre`) AS namemama,
                  padres_cch.`apel1_padre` AS apelpapa,
                  padres_cch_A.`apel1_padre` AS apelmama,
                  ".$tabla.".`papa` AS idpapa,
                  ".$tabla.".`mama` AS idmama
                  FROM `padres_cch` padres_cch
                  INNER JOIN `".$tabla."` ".$tabla." ON padres_cch.`id_padre` = ".$tabla.".`papa`
                  INNER JOIN `padres_cch` padres_cch_A ON ".$tabla.".`mama` = padres_cch_A.`id_padre`
                  INNER JOIN `acudiente` acudiente ON ".$tabla.".`acudiente` = acudiente.`id_acudiente`
                  WHERE legalizada = ".$type.$addAlum."
                  GROUP BY `papa` , `mama`
                  ORDER BY apelpapa, apelmama";
            $consult = DB::select($consulta);
            return $consult;
	}

	public function matriculasPendientesY_A($tabla,$name){
		$consulta = "
                  SELECT
                  "
                  .$tabla.".matricula,
                  CONCAT_WS(' ',".$tabla.".`names`,".$tabla.".`fname`,".$tabla.".`lname`) AS namealum,
                  CONCAT_WS(' ',padres_cch.`nombres_padre`,padres_cch.`apel1_padre`,padres_cch.`apel2_padre`) AS namepapa,
                  CONCAT_WS(' ',padres_cch_A.`nombres_padre`,padres_cch_A.`apel1_padre`,padres_cch_A.`apel2_padre`) AS namemama,
                  padres_cch.`apel1_padre` AS apelpapa,
                  padres_cch_A.`apel1_padre` AS apelmama,
                  ".$tabla.".`papa` AS idpapa, 
                  ".$tabla.".`mama` AS idmama,
                  ".$tabla.".`matriculado` AS matriculado

                  FROM `padres_cch` padres_cch

                  INNER JOIN `".$tabla."` ".$tabla." ON padres_cch.`id_padre` = ".$tabla.".`papa`
                  INNER JOIN `padres_cch` padres_cch_A ON ".$tabla.".`mama` = padres_cch_A.`id_padre`
                  INNER JOIN `acudiente` acudiente ON ".$tabla.".`acudiente` = acudiente.`id_acudiente`

                  WHERE legalizada = 0 AND ".$tabla.".names LIKE '% ".$name." %'
                  GROUP BY `papa` , `mama`
                  ORDER BY apelpapa, apelmama
                  ";

            $consult = DB::select($consulta);
            
            return $consult;
	}


	public function matriculasLegalizadas($tabla){
		$consulta = "
                  SELECT
                  "
                  .$tabla.".matricula,
                  CONCAT_WS(' ',".$tabla.".`names`,".$tabla.".`fname`,".$tabla.".`lname`) AS namealum,
                  CONCAT_WS(' ',padres_cch.`nombres_padre`,padres_cch.`apel1_padre`,padres_cch.`apel2_padre`) AS namepapa,
                  CONCAT_WS(' ',padres_cch_A.`nombres_padre`,padres_cch_A.`apel1_padre`,padres_cch_A.`apel2_padre`) AS namemama,
                  padres_cch.`apel1_padre` AS apelpapa,
                  padres_cch_A.`apel1_padre` AS apelmama,
                  ".$tabla.".`papa` AS idpapa, 
                  ".$tabla.".`mama` AS idmama,
                  ".$tabla.".`matriculado` AS matriculado

                  FROM `padres_cch` padres_cch

                  INNER JOIN `".$tabla."` ".$tabla." ON padres_cch.`id_padre` = ".$tabla.".`papa`
                  INNER JOIN `padres_cch` padres_cch_A ON ".$tabla.".`mama` = padres_cch_A.`id_padre`
                  INNER JOIN `acudiente` acudiente ON ".$tabla.".`acudiente` = acudiente.`id_acudiente`

                  WHERE legalizada = 1
                  GROUP BY `papa` , `mama`
                  ORDER BY apelpapa, apelmama
                  ";
            $consult = DB::select($consulta);
            
            return $consult;
	}

	public function matriculasLegalizadasY_A($tabla,$name){
		$consulta = "
                  SELECT
                  "
                  .$tabla.".matricula,
                  CONCAT_WS(' ',".$tabla.".`names`,".$tabla.".`fname`,".$tabla.".`lname`) AS namealum,
                  CONCAT_WS(' ',padres_cch.`nombres_padre`,padres_cch.`apel1_padre`,padres_cch.`apel2_padre`) AS namepapa,
                  CONCAT_WS(' ',padres_cch_A.`nombres_padre`,padres_cch_A.`apel1_padre`,padres_cch_A.`apel2_padre`) AS namemama,
                  padres_cch.`apel1_padre` AS apelpapa,
                  padres_cch_A.`apel1_padre` AS apelmama,
                  ".$tabla.".`papa` AS idpapa, 
                  ".$tabla.".`mama` AS idmama,
                  ".$tabla.".`matriculado` AS matriculado

                  FROM `padres_cch` padres_cch

                  INNER JOIN `".$tabla."` ".$tabla." ON padres_cch.`id_padre` = ".$tabla.".`papa`
                  INNER JOIN `padres_cch` padres_cch_A ON ".$tabla.".`mama` = padres_cch_A.`id_padre`
                  INNER JOIN `acudiente` acudiente ON ".$tabla.".`acudiente` = acudiente.`id_acudiente`

                  WHERE legalizada = 0 AND alumnos.names LIKE '%".$name."%'
                  GROUP BY `papa` , `mama`
                  ORDER BY apelpapa, apelmama
                  ";
            $consult = DB::select($consulta);
            
            return $consult;
	}

      public function srch_padre($id){
            $padre = DB::table('padres_cch')
            ->select(
                  'id_padre as id' ,
                  DB::raw("CONCAT_WS(' ', nombres_padre, apel1_padre, apel2_padre) as nombre")
            )
            ->where('id_padre','=',$id)
            ->get();
            return $padre;
      }
      public function srch_hijos($idP,$idM,$tabla){
            $hijos = DB::table($tabla)->select($tabla.'.id',
                  DB::raw("CONCAT_WS(' ', fname, lname, names) as nombre"),
                  DB::raw('CURDATE(), (YEAR(CURDATE())-YEAR(date_born)(RIGHT(CURDATE(),5)<RIGHT(date_born,5)) AS age'),
                  'grados.nombre as grado'                  
            )->join('grados','grados.id','=',$tabla.'.grado')
            ->where('papa','=',$idP)
            ->where('mama','=',$idM)
            ->get();
            return $hijos;
      }

      public function srchDataPadre($id){
            $padre = DB::table('padres_cch')
            ->select(
                  'id_padre as id' ,
                  DB::raw("CONCAT_WS(' ', nombres_padre, apel1_padre, apel2_padre) as nombre"),
                  'numdoc_padre as CC',
                  'tel_casa_padre as telefono',
                  'celular_padre as celular',
                  'email_padre as email',
                  'direccion'
            )
            ->where('id_padre','=',$id)
            ->get();
            return $padre;
      }
}
