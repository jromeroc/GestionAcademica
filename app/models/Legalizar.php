<?php

class Legalizar extends Eloquent
{

	public function matriculasPendientes($tabla){
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

                  WHERE legalizada = 0
                  GROUP BY `papa` , `mama`
                  ORDER BY apelpapa, apelmama
                  ";
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
}
