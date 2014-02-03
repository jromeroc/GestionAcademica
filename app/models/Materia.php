<?php

class Materia extends Eloquent
{
	protected $table = "materias";

	public function autoComplete($cadena)
	{
		$list_mat = $this->select('name as value','id')->where('name', "LIKE", "%".Input::get('term')."%")->get()->toArray();
		return $list_mat;
	}
}

?>