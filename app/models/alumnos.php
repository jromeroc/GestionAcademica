<?php
class AlumnosController extends Eloquent{
	
	protected $table = 'alumnos';
	
	public function filtroAlumnosGrado($grupo)
	{
		$list_alumn = $this->select('name as value','id')->where('grupo','=',$grupo)->get()->toArray();
		return $list_alumn;
	}

}

?>