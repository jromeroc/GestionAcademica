<?php

class Observador extends Eloquent
{
    protected $table = 'obsv_disciplinario';
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion','id_obsv','id_alumno');
    public $errors;

    public function get_Id($fecha,$id_docente,$descripcion)
    {
        $consulta = $this->select('id')
        ->where('id_docente','=',$id_docente)
        ->where('fecha','=',$fecha)
        ->where('descripcion','=',$descripcion)->first();
        return $consulta;
    }

    public function save_map($id_obsv,$id_alumn)
    { 

        DB::table('map_obs_academico')->insert(
            array
                (
                    'id_obsv'   =>$id_obsv,
                    'id_alumno' =>$id_alumn
                )
            );
    }

    public function delete_map($id,$id_alumno)
    {
        DB::table('map_obs_academico')
        ->where('id_obsv','=',$id)
        ->where('id_alumno','=',$id_alumno)
        ->delete();
    }
    
    //Seleccionar los registros
    public function selectobsv($fechaini='',$fechafin='',$alum='',$grado='')
    {
        $consulta = "SELECT
                obsv_disciplinario.id AS id,
                obsv_disciplinario.fecha AS fecha,
                obsv_disciplinario.id_docente AS id_docente,
                CONCAT_WS(' ', docentes.nombres,docentes.pri_apellido,docentes.seg_apellido) AS docente,
                obsv_disciplinario.descripcion AS descripcion,
                obsv_disciplinario.grupo AS grupo,
                grupos.nombre AS namegroup,
                map_obs_academico.id_alumno AS idalumn,
                CONCAT_WS(' ', alumnos.names,alumnos.fname,alumnos.lname) AS alumname
                FROM
                `alumnos` alumnos INNER JOIN `map_obs_academico` map_obs_academico ON alumnos.`id` = map_obs_academico.`id_alumno`
                INNER JOIN `obsv_disciplinario` obsv_disciplinario ON map_obs_academico.`id_obsv` = obsv_disciplinario.`id`
                INNER JOIN `docentes` docentes ON obsv_disciplinario.`id_docente` = docentes.`id`
                INNER JOIN `grupos` grupos ON obsv_disciplinario.`grupo` = grupos.`id`";
            
                
            
        if ( $fechaini || $fechafin || $alum || $grado) 
        {
            $consulta .= " WHERE ";
        }
        if ((!empty($fechaini) && !empty($fechafin)) && !empty($alum)) 
        {
            $consulta .= " obsv_disciplinario.fecha between '".$fechaini."' AND '".$fechafin."'"." AND map_obs_academico.id_alumno = ".$alum;
            $observacion = DB::select($consulta);
            return $observacion;
        }

        if(!empty($fechaini) && !empty($fechafin))
        {
            $consulta .= " obsv_disciplinario.fecha between '".$fechaini."' AND '".$fechafin."'";
        }

        if(!empty($alum))
        {
            $consulta .= " map_obs_academico.id_alumno = ".$alum;
        }
      
        $observacion = DB::select($consulta);
        return $observacion;
    }
    
    public function findObsv($idob)
    {
        $observacion=$this->select(DB::raw("CONCAT_WS(' ',docentes.nombres,docentes.pri_apellido,docentes.seg_apellido) as docente"),'fecha','id_docente','descripcion','grupo','obsv_disciplinario.id')
        ->join('docentes','docentes.id','=','obsv_disciplinario.id_docente')
        ->where('obsv_disciplinario.id','=',$idob)
        ->first()->toArray();
        return $observacion;
    }
    public function findAlumn($idob)
    {
        $alum=DB::table('map_obs_academico')->select('id_alumno')->where('id_obsv','=',$idob)->get();
        return $alum;
    }

    public function srch_alumsMap($idob)
    {
        $alums=DB::table('map_obs_academico')->select('id_alumno')->where('id_obsv','=',$idob)->get();
        return $alums;
    }

    public function updateob($idob,$fecha,$id_docente,$descripcion,$grupo){
        $observacion=DB::table('obsv_disciplinario')
        ->where('id','=',$idob)
        ->update(array('fecha'=>$fecha,'descripcion'=>$descripcion,'grupo'=>$grupo,'id_docente'=>$id_docente));
    }

    public function up_create_Map($idob,$alums){
        $create=DB::table('map_obs_academico')->insert(
            array
                (
                    'id_obsv'   =>$idob,
                    'id_alumno' =>$alums
                )
            );
    }
    public function up_delete_Map($idob,$alums){
        $delete=DB::table('map_obs_academico')
        ->where('id_obsv','=',$idob)
        ->where('id_alumno','=',$alums)
        ->delete();
    }
}