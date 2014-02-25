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
    //Seleccionar los registros
    public function selectobsv(){
        $observacion = $this->select(DB::raw("CONCAT_WS(' ',docentes.nombres,docentes.pri_apellido,docentes.seg_apellido) as docenten"),
            'grupos.nombre as grado', 'obsv_disciplinario.id as id_obsv',
            DB::raw("CONCAT_WS(' ',alumnos.lname,alumnos.fname,alumnos.names) as alumno"),
            'map_obs_academico.id_obsv as id_obsvM','map_obs_academico.id_alumno as id_alumnom',
            'alumnos.id as idalum','docentes.id as id_docente','obsv_disciplinario.id_docente as id_docenteo')
            ->join('map_obs_academico','obsv_disciplinario.id_obsv','=','map_obs_academico.id_obsv')
            ->join('map_obs_academico','alumnos.id','=','map_obs_academico.idalumno')
            ->get();
        return $$observacion;
    }

}                        