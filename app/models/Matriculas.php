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


}
?>