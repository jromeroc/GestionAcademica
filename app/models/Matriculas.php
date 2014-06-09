<?php

class Matriculas extends Eloquent
{
	protected $tablaAlumnos;
    protected $perPage = 2;
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

    public function srch_cod_matri($tablaAlumnos,$id_alum){
        $consult = DB::table($tablaAlumnos)
            ->select('matricula')
            ->where('id','=',$id_alum)
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

    public function srch_CodM_alum($tabla,$ida){
        $codM = DB::table($tabla)->select('matricula')->where('id','=',$ida)->get();
        return $codM;
    }

    public function srch_tipoR($tabla,$ida){
        $tipoR = DB::table($tabla)->select('matriculado')->where('id','=',$ida)->get();
        return $tipoR;
    }

    public function srchNameAlum($tabla,$ndoc){
        $name = DB::table($tabla)->select(DB::raw("CONCAT_WS(' ',names,fname,lname) as value"))
        ->where('num_document','=',$ndoc)->get();
        return $name;
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
                'direccion'          => $data['direccion'],
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
                'direccion'          => $data['direccion'],
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
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->paginate(5);

                return $consulta;
        }
        public function selectmatriculados_g($tabla,$grado){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->paginate(5);
                return $consulta;
        }

        public function selectmatriculados_n($tabla,$alum){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->paginate(5);
                return $consulta;
        }

        public function selectmatriculados_g_n($tabla,$grado,$alum){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','1')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->paginate(5);
                return $consulta;
        }

        public function srch_alum_edit($id,$tabla){
            $consulta = 

            " SELECT
                ciudades.`id_ciudad` AS id_ciudad,
                ciudades.`nombre_ciudad` AS nombre_ciudad,".
                $tabla.".`id` AS id, ".
                $tabla.".`matricula` AS matricula, ".
                $tabla.".`grado` AS grado, ".
                $tabla.".`names` AS names, ".
                $tabla.".`fname` AS fname, ".
                $tabla.".`lname` AS lname, ".
                $tabla.".`tipo_document` AS tipo_document, ".
                $tabla.".`num_document` AS num_document, ".
                $tabla.".`exp_document` AS exp_document, ".
                $tabla.".`date_born` AS date_born, ".
                $tabla.".`pais_born` AS pais_born, ".
                $tabla.".`city_born` AS city_born, ".
                $tabla.".`sexo` AS sexo, ".
                $tabla.".`grupo_san` AS grupo_san, ".
                $tabla.".`rh` AS rh, ".
                $tabla.".`eps` AS eps, ".
                $tabla.".`tipo_hermano` AS tipo_hermano, ".
                $tabla.".`direccion` AS direccion, ".
                $tabla.".`telefono` AS telefono, ".
                $tabla.".`celular` AS celular, ".
                $tabla.".`mail` AS mail, ".
                $tabla.".`papa` AS papa, ".
                $tabla.".`mama` AS mama, ".
                $tabla.".`acudiente` AS alumnos_acudiente, ".
                $tabla.".`date_matricula` AS date_matricula, ".
                $tabla.".`matriculado` AS matriculado, ".
                "ciudades_A.`nombre_ciudad` AS city_born_name,
                ciudades_A.`id_ciudad` AS city_born_id,
                paises.`id_pais` AS id_pais,
                paises.`name_pais` AS name_pais
                
            FROM ciudades

            INNER JOIN ".$tabla." ".$tabla." ON ciudades.`id_ciudad` = ".$tabla.".`city_born`
            INNER JOIN `ciudades` ciudades_A ON ".$tabla.".`exp_document` = ciudades_A.`id_ciudad`
            INNER JOIN `paises` paises ON ".$tabla.".`pais_born` = paises.`id_pais`
            
            WHERE 
            
            ". 
            
            

            $tabla.".id = ".$id;

            $consult = DB::select($consulta);
            
            return $consult;
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

        public function update_matri($id,$tabla,$data){
            $update = DB::table($tabla)
            ->where('id','=',$id)
            ->update(
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
                    // 'matricula'          => $data['codigoMatri'],
                    'date_born'          => $data['fecha_nac']
                )
            );
        }
    // 

    public function selectinscritos($tabla){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','0')
                ->where('retirado','=','0')
                ->paginate(9);

            return $consulta;
        }

    public function selectinscritos_g($tabla,$grado){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','0')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->paginate(5);
                return $consulta;
        }
    
    public function selectinscritos_n($tabla,$alum){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','0')
                ->where('retirado','=','0')
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->paginate(5);
                return $consulta;
        }

    public function selectinscritos_g_n($tabla,$grado,$alum){
            $consulta = DB::table($tabla)
                ->select($tabla.'.id','grado' , 'fname' , 'lname' , 'names' , 'grados.nombre as Grado' , $tabla.'.matricula')
                ->join('grados',$tabla.'.grado','=','grados.id')
                ->where('matriculado','=','0')
                ->where('retirado','=','0')
                ->where('grado','=',$grado)
                ->where($tabla.".names" , "LIKE" , '%'.$alum.'%')
                ->paginate(5);
                return $consulta;
        }

    public function listFamilias($tipo = 0)
    {
        if($tipo)
        {

        }
        else
        {
            
        }
    }
}
?>