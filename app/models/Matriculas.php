<?php

class Matriculas extends Eloquent
{
	protected $tablaAlumnos;
	public function autoCompletename($alum,$year,$tablaAlumnos)
	{	
		$consult = DB::table($tablaAlumnos)->select("*",DB::raw("CONCAT_WS(' ',lname,fname,names) as value, id"))
		->join('paises',$tablaAlumnos.'.pais_born', '=', 'paises.id_pais')
        ->join('ciudades',$tablaAlumnos.'.city_born', '=', 'ciudades.id_ciudad')
		->whereRaw("CONCAT_WS(' ',lname,fname,names) LIKE '%".$alum."%'")
		->get();
		return $consult;
	}
    public function srchid_alum($tabla,$ndoc){
        $consult = DB::table($tabla)->select('id')
        ->where('num_document','=',$ndoc)->get();
        return $consult;
    }

    public function srchid_alum_name($tabla,$name){
        $consult = DB::table($tabla)->select('id')
        ->where('names','=',$name)->get();
        return $consult;
    }

    public function srchid_alum_codm($tabla,$codm){
        $consult = DB::table($tabla)->select('id')
        ->where('matriculado','=',$codm)->get();
        return $consult;
    }

	public function cod_matri($tablaAlumnos){
		$consult = DB::table($tablaAlumnos)->max('matricula');
		return $consult;
	}
	public function saveMatricula($data,$tabla){
		DB::table($tabla)->insert(
    		array(
    			'matriculado' => $data['T-reg'],
    			'date_matricula' => $data['fecha_matricula'],
    			'grado' => $data['grado'],
    			'fname' => $data['fname'],
    			'lname' => $data['lnane'],
    			'names' => $data['alum'],
    			'tipo_document' => $data['tipo_doc'],
    			'num_document' => $data['n_document'],
    			'pais_born' => $data['id_pais'],
    			'city_born' => $data['id_city'],
    			'sexo' => $data['genero'],
    			'grupo_san' => $data['g_sang'],
    			'rh' => $data['RH'],
    			'eps' => $data['eps'],
    			'tipo_hermano' => $data['T-Herm'],
    			'direccion' => $data['direcc'],
    			'telefono' => $data['fijo'],
    			'celular' => $data['cel'],
    			'mail' => $data['email'],
    			'papa' => $data['papa'],
    			'mama' => $data['mama'],
    			'acudiente' => $data['acudiente'],
    			//'lastschool' => $data[''],
                'exp_document' => $data['id_city_exp'],
    			'matricula' => $data['codigoMatri'],
                'date_born' => $data['fecha_nac']
    		)
		);
    }

    public function saveInscripcion($data,$tabla){
        DB::table($tabla)->insert(
            array(
                'matriculado' => $data['T-reg'],
                'date_matricula' => $data['fecha_matricula'],
                'grado' => $data['grado'],
                'fname' => $data['fname'],
                'lname' => $data['lnane'],
                'names' => $data['alum'],
                'tipo_document' => $data['tipo_doc'],
                'num_document' => $data['n_document'],
                'pais_born' => $data['id_pais'],
                'city_born' => $data['id_city'],
                'sexo' => $data['genero'],
                'grupo_san' => $data['g_sang'],
                'rh' => $data['RH'],
                'eps' => $data['eps'],
                'tipo_hermano' => $data['T-Herm'],
                'direccion' => $data['direcc'],
                'telefono' => $data['fijo'],
                'celular' => $data['cel'],
                'mail' => $data['email'],
                'papa' => $data['papa'],
                'mama' => $data['mama'],
                'acudiente' => $data['acudiente'],
                //'lastschool' => $data[''],
            )
        );
    }

    public function autoCompleteP($padre){
        $papa = DB::table('padres_cch')->select("*",DB::raw("CONCAT_WS(' ', nombres_padre, apel1_padre, apel2_padre) as value , id_padre as id"))
        ->whereRaw("CONCAT_WS(' ', nombres_padre, apel1_padre, apel2_padre) LIKE '%".$padre."%'")
        ->get();
        return $papa;
    }

    public function autoCompleteA($acu){
        $papa = DB::table('acudiente')->select("*",'id_acudiente as id','nombre_acudiente as value' )
        ->whereRaw("nombre_acudiente LIKE '%".$acu."%'")
        ->get();
        return $papa;
    }

    public function srch_Id_Papa($tabla,$ida){

        $papa="SELECT padres_cch.id_padre AS id_padre FROM padres_cch 
        INNER JOIN alumnos_last ON padres_cch.id_padre = ".$tabla.".papa"."
        WHERE ".$tabla.".id =".$ida;
        $padre = DB::select($papa);
        return $padre;

    }

        public function srch_Id_Mama($tabla,$ida){

        $mama="SELECT padres_cch.id_padre AS id_padre FROM padres_cch 
        INNER JOIN alumnos_last ON padres_cch.id_padre = ".$tabla.".mama"."
        WHERE ".$tabla.".id =".$ida;
        $madre = DB::select($mama);
        return $madre;
    }

    public function srch_Id_Ac($tabla,$ida){

        $acudiente="SELECT acudiente.id_acudiente AS id_acudiente FROM alumnos_last 
        INNER JOIN acudiente ON alumnos_last.acudiente = acudiente.id_acudiente
        WHERE ".$tabla.".id =".$ida;
        $ac = DB::select($acudiente);
        return $ac;
    }

    public function srch_N_alum($tabla,$ida){
        $alum = DB::table($tabla)->select('names')->where('id','=',$ida)->get();
        return $alum;
    }

        public function srch_tipoR($tabla,$ida){
        $tipoR = DB::table($tabla)->select('matriculado')->where('id','=',$ida)->get();
        return $tipoR;
    }

    public function srch_Papa($id){
        $infop = DB::table('padres_cch')->select('*')->where('id_padre','=',$id)->first();
        return $infop;
    }

    public function srch_Acudiente($id){
        $infoa = DB::table('acudiente')->select('*')->where('id_acudiente','=',$id)->first();
        return $infoa;
    }
    
    public function SavePadre($data){
        $papa = DB::table('padres_cch')
        ->insert(
            array(
                'nombres_padre'      => $data['nameP'],
                'apel1_padre'        => $data['fnameP'],
                'apel2_padre'        => $data['lnameP'],
                'id_tipodoc_padre'   => $data['tipo_docP'],
                'numdoc_padre'       => $data['Num_docP'],
                'profesion_padre'    => $data['profP'],
                'ocupacion_padre'    => $data['ocP'],
                'empresa_padre'      => $data['empP'],
                'tel_casa_padre'     => $data['fijoP'],
                'tel_oficina_padre'  => $data['TofP'],
                'celular_padre'      => $data['celP'],
                'email_padre'        => $data['emailP'],
                'tipo_padre'         => $data['genero']
            )
        );
    }
/*
    public function asignPapa($tabla,$ida,idp){
        $alum = DB::table($tabla)
        ->where('id','=',$ida)
        ->insert(
            array(
            'papa' => $idp
            )
        );
    }

    public function asignMama($tabla,$ida,idm){
        $alum = DB::table($tabla)
        ->where('id','=',$ida)
        ->insert(
            array(
            'mama' => $idm
            )
        );
    }
    */
    public function UpdatePadre($data){
        $papa = DB::table('padres_cch')
        ->where('id_padre','=',$data['datosp'])
        ->update(
            array(
                'nombres_padre'      => $data['nameP'],
                'apel1_padre'        => $data['fnameP'],
                'apel2_padre'        => $data['lnameP'],
                'id_tipodoc_padre'   => $data['tipo_docP'],
                'numdoc_padre'       => $data['Num_docP'],
                'profesion_padre'    => $data['profP'],
                'ocupacion_padre'    => $data['ocP'],
                'empresa_padre'      => $data['empP'],
                'tel_casa_padre'     => $data['fijoP'],
                'tel_oficina_padre'  => $data['TofP'],
                'celular_padre'      => $data['celP'],
                'email_padre'        => $data['emailP'],
                'tipo_padre'         => $data['genero'],
            )
            );
    }
    public function SaveAc($data){
        $papa = DB::table('acudiente')
        ->insert(
            array(
                'nombre_acudiente'      => $data['nameA'],
                'parentesco_acudiente'  => $data['ParentA'],
                'telefono_acudiente'    => $data['telA'],
                'celular_acudiente'     => $data['celA'],
                'teloficina_acudiente'  => $data['telOfA'],
            )
            );
    }

    public function UpdateAc($data){
        $papa = DB::table('padres_cch')
        ->where('id_acudiente','=',$data['datosA'])
        ->update(
            array(
                'nombre_acudiente'      => $data['nameA'],
                'parentesco_acudiente'  => $data['parentA'],
                'telefono_acudiente'    => $data['telA'],
                'celular_acudiente'     => $data['celA'],
                'teloficina_acudiente'  => $data['telOfA'],
            )
            );
    }
}
?>