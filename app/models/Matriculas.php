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

    public function srch_Papa($id){
        $infop = DB::table('padres_cch')->select('*')->where('id_padre','=',$id)->first();
        return $infop;
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
                'tipo_padre'         => $data['genero'],
            )
            );
    }

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
}
?>