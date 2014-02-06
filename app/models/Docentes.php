<?php

class Docentes extends Eloquent
{
	protected $table = 'docentes';

	public function autocomplete($find)
	{
		$list_docente = $this->select('docentes.id as id','CONCAT_WS(" ",docente.nombres,docente.pri_apellido,segapellido) as value')->where('value','LIKE' , $find);
		return $list_docente;
	}

}
?>