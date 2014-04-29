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
    			'matriculado'        => $data['T-reg'],
    			'date_matricula'     => $data['fecha_matricula'],
    			'grado'              => $data['grado'],
    			'fname'              => $data['fname'],
    			'lname'              => $data['lnane'],
    			'names'              => $data['alum'],
    			'tipo_document'      => $data['tipo_doc'],
    			'num_document'       => $data['n_document'],
    			'pais_born'          => $data['id_pais'],
    			'city_born'          => $data['id_city'],
    			'sexo'               => $data['genero'],
    			'grupo_san'          => $data['g_sang'],
    			'rh'                 => $data['RH'],
    			'eps'                => $data['eps'],
    			'tipo_hermano'       => $data['T-Herm'],
    			'direccion'          => $data['direcc'],
    			'telefono'           => $data['fijo'],
    			'celular'            => $data['cel'],
    			'mail'               => $data['email'],
    			'papa'               => $data['papa'],
    			'mama'               => $data['mama'],
    			'acudiente'          => $data['acudiente'],
    			// 'lastschool'         => $data[''],
                'exp_document'       => $data['id_city_exp'],
    			'matricula'          => $data['codigoMatri'],
                'date_born'          => $data['fecha_nac']
    		)
		);
    }

    public function saveInscripcion($data,$tabla){
        DB::table($tabla)->insert(
            array(
                'matriculado'       => $data['T-reg'],
                'date_matricula'    => $data['fecha_matricula'],
                'grado'             => $data['grado'],
                'fname'             => $data['fname'],
                'lname'             => $data['lnane'],
                'names'             => $data['alum'],
                'tipo_document'     => $data['tipo_doc'],
                'num_document'      => $data['n_document'],
                'pais_born'         => $data['id_pais'],
                'city_born'         => $data['id_city'],
                'sexo'              => $data['genero'],
                'grupo_san'         => $data['g_sang'],
                'rh'                => $data['RH'],
                'eps'               => $data['eps'],
                'tipo_hermano'      => $data['T-Herm'],
                'direccion'         => $data['direcc'],
                'telefono'          => $data['fijo'],
                'celular'           => $data['cel'],
                'mail'              => $data['email'],
                'papa'              => $data['papa'],
                'mama'              => $data['mama'],
                'acudiente'         => $data['acudiente'],
                'exp_document'      => $data['id_city_exp'],
                'date_born'         => $data['fecha_nac']
                // 'lastschool' => $data[''],
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
        INNER JOIN ".$tabla." ON padres_cch.id_padre = ".$tabla.".papa"."
        WHERE ".$tabla.".id =".$ida;
        $padre = DB::select($papa);
        return $padre;
    }

    public function srch_papa_ndoc($doc){
        $papa = DB::table('padres_cch')->select('id_padre')
        ->where('numdoc_padre','=',$doc)
        ->get();
        return $papa;
    }

        public function srch_Id_Mama($tabla,$ida){

        $mama="SELECT padres_cch.id_padre AS id_padre FROM padres_cch 
        INNER JOIN ".$tabla." ON padres_cch.id_padre = ".$tabla.".mama"."
        WHERE ".$tabla.".id =".$ida;
        $madre = DB::select($mama);
        return $madre;
    }

    public function srch_Id_Ac($tabla,$ida){

        $acudiente="SELECT acudiente.id_acudiente AS id_acudiente FROM ".$tabla." 
        INNER JOIN acudiente ON ".$tabla.".acudiente"." = acudiente.id_acudiente
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

    public function srch_acu_token($token){
        $idac = DB::table('acudiente')->select('*')->where('token','=',$token)->first();
        return $idac;
    }

    public function srch_Acudiente($id){
        $infoa = DB::table('acudiente')->select('*')->where('id_acudiente','=',$id)->first();
        return $infoa;
    }
    
    public function SavePadre($data,$nombre){
        $papa = DB::table('padres_cch')
        ->insert(
            array(
                'nombres_padre'      => $nombre,
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

    public function UpdatePadre($data,$nombre){
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
                'tipo_padre'         => $data['genero']
            )
            );
    }

    public function asignPapa($tabla,$ida,$idp){
        $alum = DB::table($tabla)
        ->where('id','=',$ida)
        ->update(
            array(
            'papa' => $idp
            )
        );
    }

    public function asignMama($tabla,$ida,$idm){
        $alum = DB::table($tabla)
        ->where('id','=',$ida)
        ->update(
            array(
            'mama' => $idm
            )
        );
    }

    public function asignAcudiente($tabla,$idal,$idac){
        $alum = DB::table($tabla)
        ->where('id','=',$idal)
        ->update(
            array(
            'acudiente' => $idac
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
                'token'                 => $data['_token']
            )
            );
    }

    public function UpdateAc($data){
        $papa = DB::table('acudiente')
        ->where('id_acudiente','=',$data['datosA'])
        ->update(
            array(
                'nombre_acudiente'      => $data['nameA'],
                'parentesco_acudiente'  => $data['ParentA'],
                'telefono_acudiente'    => $data['telA'],
                'celular_acudiente'     => $data['celA'],
                'teloficina_acudiente'  => $data['telOfA'],
                'token'                 => $data['_token']
            )
            );
    }

    // Alumnos Matriculados 
        public function selectmatriculados($tabla){
            $consulta = DB::table($tabla)
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->get();
                return $consulta;
        }
        public function selectmatriculados_g($tabla,$grado){
            $consulta = DB::table($tabla)
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->get();
                return $consulta;
        }

        public function selectmatriculados_n($tabla,$alum){
            $consulta = DB::table($tabla)
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->get();
                return $consulta;
        }

        public function selectmatriculados_g_n($tabla,$grado,$alum){
            $consulta = DB::table($tabla)
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->get();
                return $consulta;
        }

        public function srch_alum_edit($id,$tabla){
            $consulta = DB::table($tabla)
            ->join('ciudades',$tabla.'.exp_document','=','ciudades.id_ciudad')
            ->join('paises',$tabla.'.pais_born','=','paises.id_pais')
            ->join($tabla.' as alum','ciudades.id_ciudad','=',$tabla.'.city_born')
            ->select(
                $tabla.'.id',
                $tabla.'.matricula',
                $tabla.'.grado',
                $tabla.'.names',
                $tabla.'.fname',
                $tabla.'.lname',
                $tabla.'.tipo_document',
                $tabla.'.num_document',
                $tabla.'.exp_document',
                $tabla.'.date_born',
                $tabla.'.pais_born',
                $tabla.'.city_born',
                $tabla.'.sexo',
                $tabla.'.grupo_san',
                $tabla.'.rh',
                $tabla.'.eps',
                $tabla.'.tipo_hermano',
                $tabla.'.direccion',
                $tabla.'.telefono',
                $tabla.'.celular',
                $tabla.'.mail',
                $tabla.'.papa',
                $tabla.'.mama',
                $tabla.'.acudiente',
                $tabla.'.date_matricula',
                $tabla.'.matriculado',
                'ciudades.id_ciudad',
                'ciudades.nombre_ciudad',
                'paises.id_pais',
                'paises.name_pais',
                'alum.id_ciudad',
                'alum.nombre_ciudad'

            )
            ->where($tabla.'.id','=',$id)
            ->get();
            return $consulta;
        }

        public function cancel_matricula($id,$tabla){
            $consulta = DB::table($tabla)
            ->where('id','=',$id)
            ->update(
                array(
                    'retirado' => 1
                )
            );
        }
    // 
}
?>