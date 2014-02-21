<?php

class CargaAcademica extends Eloquent
{
	protected $table = 'carga_academica';
	protected $fillable = array('grupo', 'materia', 'ih');

	public function reportAll()
	{
		$listCargaAsign = $this->select('map_carga.id as nid', 'materias.name as materia', 'grupos.nombre as grado')
			->join('map_carga','carga_academica.id','=','map_carga.id_carga')
			->join('grupos','carga_academica.grupo','=','grupos.id')
			->join('docentes','map_carga.id_docente','=','docentes.id')
			->join('materias','carga_academica.materia','=','materias.id')->get()->toArray();

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

	public function infoCarga($id)
	{
		$infoCarga = $this->select('materias.name as materia_srch','materias.id as materia','grupos.id as grupo','grupos.nombre as name_grado','carga_academica.ih','carga_academica.id as carga')
			->join('grupos','carga_academica.grupo', '=', 'grupos.id')
			->join('materias','carga_academica.materia', '=', 'materias.id')
			->where('carga_academica.id','=', $id)->first();
		return $infoCarga;
	}
}

?>