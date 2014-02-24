<?php

class CargaAcademica extends Eloquent
{
	protected $table = 'carga_academica';
	protected $fillable = array('grupo', 'materia', 'ih');

	public function reportAll($id, $tipo = false)
	{
		$listCargaAsign = $this->select("CONCAT_WS(' ',docentees.nombres,docentes.pri_apellido,docentes.seg_apellido) as docente",'map_carga.id as nid', 'map_carga.nombre_materia as materia', 'map_carga.periodo as periodo', 'grupos.nombre as grado')
			->join('map_carga','carga_academica.id','=','map_carga.id_carga')
			->join('grupos','carga_academica.grupo','=','grupos.id')
			->join('docentes','map_carga.id_docente','=','docentes.id')
			->join('materias','carga_academica.materia','=','materias.id');
		
		if ($tipo) {
			$listCargaAsign->where('map_carga.id_carga','=',$id)->get()->toArray();
		} else {
			$listCargaAsign->where('map_carga.id','=',$id)->get()->toArray();
		}
		
		return $listCargaAsign;
	}

	public function reportCarga()
	{
		$listCarga = $this->select('materias.name as materia', 'grupos.nombre as grado', 'carga_academica.ih','carga_academica.id as carga')
			->join('grupos','carga_academica.grupo','=','grupos.id')
			->join('materias','carga_academica.materia','=','materias.id')
			->get();
		return $listCarga;
	}

	public function infoCarga($id, $tipo = false)
	{
		$infoCarga = $this->select('materias.name as materia_srch','materias.id as materia','grupos.id as grupo','grupos.nombre as name_grado','carga_academica.ih','carga_academica.id as carga')
			->join('grupos','carga_academica.grupo', '=', 'grupos.id')
			->join('materias','carga_academica.materia', '=', 'materias.id')
			->where('carga_academica.id','=', $id)->first();
		return $infoCarga;
	}

	public function infoAsignacion($id)
	{
		$listCargaAsign = $this->select(DB::raw("CONCAT_WS(' ',nombres,pri_apellido,seg_apellido) as docente"),'map_carga.id as nid', 'map_carga.nombre_materia as materia', 'map_carga.periodo as periodo', 'grupos.nombre as grado')
			->join('map_carga','carga_academica.id','=','map_carga.id_carga')
			->join('grupos','carga_academica.grupo','=','grupos.id')
			->join('docentes','map_carga.id_docente','=','docentes.id')
			->join('materias','carga_academica.materia','=','materias.id')
			->where('map_carga.id_carga','=',$id)->get()->toArray();

		return $listCargaAsign;
	}

	public function asignaObservacion($datainfo)
	{
		DB::table('map_carga')->insert(array(
			'id_carga'=>$datainfo[0],
			'id_docente'=>$datainfo[1],
			'nombre_materia'=>$datainfo[2],
			'periodo'=>$datainfo[3]));
	}


}

?>