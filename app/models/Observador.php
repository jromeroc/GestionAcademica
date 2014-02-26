<?php

class Observador extends Eloquent
{
    protected $table = 'obsv_disciplinario';
    protected $fillable = array('fecha', 'id_docente','grupo','descripcion','id_obsv','id_alumno');
    public $errors;

    public function get_Id($fecha,$id_docente,$descripcion){
        $consulta = $this->select('id')
        ->where('id_docente','=',$id_docente)
        ->where('fecha','=',$fecha)
        ->where('descripcion','=',$descripcion)->first();
        return $consulta;
    }

    public function save_map($id_obsv,$id_alumn){ 

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
    public function selectobsv(){
        $observacion = DB::select("SELECT
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
            INNER JOIN `grupos` grupos ON obsv_disciplinario.`grupo` = grupos.`id`"
            );
        return $observacion;
    }

    public function findObsv($idob){
        $observacion=$this->select(DB::raw("CONCAT_WS(' ',docentes.nombres,docentes.pri_apellido,docentes.seg_apellido) as docente"),'fecha','id_docente','descripcion','grupo','docentes.id')
        ->join('docentes','docentes.id','=','obsv_disciplinario.id_docente')
        ->where('obsv_disciplinario.id','=',$idob)
        ->first()->toArray();
        return $observacion;
    }
    public function findAlumns($idob){
        $observacion=DB::table('map_obs_academico')->select('id_alumno')->where('id_obsv','=',$idob)->get();
        return $observacion;
    }

}                        