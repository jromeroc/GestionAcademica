<?php

class MatriculasController extends BaseController
{
	public $errors;
	public $_matricula;

	public function __construct()
	{
		$this->_matricula = new Matriculas();
	}

	public function asign_year(){
		$year=date('Y');
		$anterior = $year-2;
		
		if ($year == date('Y') && (date('m') <=7 )) {
			$lastY = $year - 1;
			$nextY = $year + 1;
			$last = $anterior." - ".$lastY;
			$act = $lastY." - ".$year;
			$next = $year." - ".$nextY;
		}
		elseif ($year == date('Y') && $month >= 8) {
			$lastY = $year - 1;
			$nextY = $year + 1;
			$last = $anterior." - ".$lastY;
			$act = $lastY." - ".$year;
			$next = $year." - ".$nextY;
		}

		$anos = array("year"	=>	$year 	,
					  "act"		=>	$act 	,
					  "lastY"	=>	$lastY 	,
					  "last"	=>	$last 	,
					  "nextY"	=>	$nextY 	,
					  "next"	=>	$next
		);
		return $anos;
	}

	public function MatriculaAlum(){
		
		$tipos = Tipodoc::all()->lists('name','id');
		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		$anos = $this->asign_year();
		
		
		return View::Make('matriculas.alum')->with(array('anos' => $anos,'tipodoc'=>$tipos,'grado'=>$grados));
	}

	public function nuevo(){
		if(Input::get())
		{
			$data = Input::all();			
			$reglas = array(
				'alum'					=>	'required',
				'fname'					=>	'required',
				'year_matricula'		=>	'required',
				'genero'				=>	'required',
				'grado'					=>	'required',
				'T-reg'					=>  'required'
			);
			$mensajes = array(
					'alum.required'			 	=> 'Digite el nombre del alumno.',
					'fname.required' 			=> 'Digite el apellido del alumno.',
					'year_matricula.required' 	=> 'Seleccione un año Escolar.',
					'genero.required' 			=> 'Seleccione un genero.',					
					'grado.required' 			=> 'Seleccione un grado.',				
					'T-reg.required' 			=> 'Seleccione Inscripcion o Matricula.'				
			);

			if (Input::get('T-reg')==1) 
			{
				$reglas['fecha_matricula'] = 'required';
				$mensajes['fecha_matricula.required'] = 'Seleccione la fecha de la matricula.';
				$tabla = $this->asignTabla($data['year_matricula']);
				$codigoMatri = $this->_matricula->cod_matri($tabla);
				$codigoMatri = $codigoMatri +1;
				$validacion = Validator::make($data,$reglas,$mensajes);
				
				if ($validacion->fails())
				{
					return View::Make('matriculas.alum')->withInput()->withErrors($validacion)->with(array('datos'=>$data));
				}
				
				else
				{
					$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
					$tabla = $this->asignTabla($data['year_matricula']);
					$data['codigoMatri']=$codigoMatri;
					$save = $this->_matricula->saveMatricula($data,$tabla);
					if (!empty($data['n_document'])) {
						$name = $this->_matricula->srchNameAlum($tabla,$data['n_document']);
						$name = get_object_vars($name[0]);
						$name = $name['value'];
					}

					if (!empty($data['id_alum'])) {	
						return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$data['alum'],'year'=>$data['year_matricula'],'id_alum'=>$data['id_alum'],'codM'=>$codigoMatri));
					}
					else{
						if (!empty($data['n_document'])) {
							$tabla = $this->asignTabla($data['year_matricula']);
	 						$id_alum = $this->_matricula->srchid_alum($tabla,$data['n_document']);
	 						$id_alum = get_object_vars($id_alum[0]);
	 						$id_alum = $id_alum['id'];
	 						
							return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$name,'year'=>$data['year_matricula'],'id_alum'=>$id_alum,'codM'=>$codigoMatri));
	 						
						}
						else{
							$tabla = $this->asignTabla($data['year_matricula']);
	 						$id_alum = $this->_matricula->srchid_alum_name($tabla,$data['alum']);
	 						$id_alum = get_object_vars($id_alum[0]);
	 						$id_alum = $id_alum['id'];
							return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$name,'year'=>$data['year_matricula'],'id_alum'=>$id_alum,'codM'=>$codigoMatri));
						}
					}
					//Error ID ALUM
				}
			}
			if (Input::get('T-reg')==0) 
			{
				$validacion = Validator::make($data,$reglas,$mensajes);
				if ($validacion->fails()) 
				{
					return View::make('matriculas.alum')->withInput()->withErrors($validacion)->with(array('datos'=>$data));
				}

				else
				{
					$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
					$tabla = $this->asignTabla($data['year_matricula']);
					$save = $this->_matricula->saveInscripcion($data,$tabla);
					if (!empty($data['n_document'])) {
						$name = $this->_matricula->srchNameAlum($tabla,$data['n_document']);
						$name = get_object_vars($name[0]);
						$name = $name['value'];
					}

					if (!empty($data['id_alum'])) {	
						return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$name,'year'=>$data['year_matricula'],'id_alum'=>$data['id_alum']));
					}
					else{
						if (!empty($data['n_document'])) {
							$tabla = $this->asignTabla($data['year_matricula']);
	 						$id_alum = $this->_matricula->srchid_alum($tabla,$data['n_document']);
	 						
	 						$id_alum = get_object_vars($id_alum[0]);
	 						$id_alum = $id_alum['id'];	
							return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$name,'year'=>$data['year_matricula'],'id_alum'=>$id_alum));
	 						
						}
						elseif(!empty($data['alum'])){
							$tabla = $this->asignTabla($data['year_matricula']);
	 						$id_alum = $this->_matricula->srchid_alum_name($tabla,$data['alum']);
	 						$id_alum = get_object_vars($id_alum[0]);
	 						$id_alum = $id_alum['id'];
							return View::make('matriculas.info-complementaria')->with(array('tipoR'=>$data['T-reg'],'name'=>$name,'year'=>$data['year_matricula'],'id_alum'=>$id_alum));
						}
					}
					//Error ID ALUM
				}
			}			
		}
	}

	public function asignTabla($year){
			
			if ($year == date('Y') && (date('m')<=7)) 
			{
				$tablaAlumnos = "alumnos";
			}
			
			elseif($year < date('Y'))
			{
				$tablaAlumnos = "alumnos_last";
			}

			elseif($year == date('Y') && (date('m')>=8))
			{
				$tablaAlumnos = "alumnos_next";
			}

			elseif($year > date('Y') && (date('m')<=7))
			{
				$tablaAlumnos = "alumnos_next";
			}

			return $tablaAlumnos;
		}



	public function padre($id,$year){
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
		if (!empty($id))
		{
			$tabla = $this->asignTabla($year);
			
			$alum = $this->_matricula->srch_N_alum($tabla,$id);
			$alum = get_object_vars($alum[0]);
			$alum = $alum['names'];
			
			$codM = $this->_matricula->srch_CodM_alum($tabla,$id);
			$codM = get_object_vars($codM[0]);
			$codM = $codM['matricula'];

			$tipoR = $this->_matricula->srch_tipoR($tabla,$id);
			$tipoR = get_object_vars($tipoR[0]);
			$tipoR = $tipoR['matriculado'];

			$genero	= 1;
			$papa = $this->_matricula->srch_Id_Papa($tabla,$id);
			
			if (!empty($papa)) 
			{
				$papa = get_object_vars($papa[0]);
				$id_papa=$papa['id_padre'];
				$datos_P=$this->_matricula->srch_Papa($id_papa);
				$datos_P=get_object_vars($datos_P);					
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_P,'padre'=>'Padre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero));
			}
			else
			{
				$datos_P = "";
			}
			if ($tipoR == 1) {
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_P,'padre'=>'Padre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero,'codM'=>$codM));
			}else{
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_P,'padre'=>'Padre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero));
			}

		}
	}

	public function madre($id,$year){
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
		if (!empty($id))
		{
			$tabla = $this->asignTabla($year);
			$alum = $this->_matricula->srch_N_alum($tabla,$id);
			$alum = get_object_vars($alum[0]);
			$alum = $alum['names'];

			$codM = $this->_matricula->srch_CodM_alum($tabla,$id);
			$codM = get_object_vars($codM[0]);
			$codM = $codM['matricula'];

			$tipoR = $this->_matricula->srch_tipoR($tabla,$id);
			$tipoR = get_object_vars($tipoR[0]);
			$tipoR = $tipoR['matriculado'];
			$genero= 0;

			$mama = $this->_matricula->srch_Id_Mama($tabla,$id);
			if (!empty($mama)) {
				$mama = get_object_vars($mama[0]);
				$id_mama=$mama['id_padre'];
				$datos_M=$this->_matricula->srch_Papa($id_mama);
				$datos_M=get_object_vars($datos_M);
				if ($tipoR == 1) {
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_M,'padre'=>'Madre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero,'codM'=>$codM));
				}
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_M,'padre'=>'Madre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero));
			}
			else{
				$datos_M="";
			}

			if ($tipoR == 1) {
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_M,'padre'=>'Madre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero,'codM'=>$codM));
			}else{
				return View::Make('matriculas.padre')->with(array('tipodoc'=>$tipos,'papa'=>$datos_M,'padre'=>'Madre','name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'genero'=>$genero));
			}
			
		}
	}

	public function acudiente($id,$year){
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
		if (!empty($id))
		{
			$tabla = $this->asignTabla($year);
			$alum = $this->_matricula->srch_N_alum($tabla,$id);
			$alum = get_object_vars($alum[0]);
			$alum = $alum['names'];

			$codM = $this->_matricula->srch_CodM_alum($tabla,$id);
			$codM = get_object_vars($codM[0]);
			$codM = $codM['matricula'];

			$tipoR = $this->_matricula->srch_tipoR($tabla,$id);
			$tipoR = get_object_vars($tipoR[0]);
			$tipoR = $tipoR['matriculado'];

			$acu = $this->_matricula->srch_Id_Ac($tabla,$id);
			if (!empty($acu)) {
				$acu = get_object_vars($acu[0]);
				$id_acudiente = $acu['id_acudiente'];
				$datos_A=$this->_matricula->srch_Acudiente($id_acudiente);
				$datos_A=get_object_vars($datos_A);
				
			}else{
				$datos_A="";
			}
			if ($tipoR == 1) {
				return View::Make('matriculas.acudiente')->with(array('tipodoc'=>$tipos,'acudiente'=>$datos_A,'name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year,'codM'=>$codM));
			}else{
				return View::Make('matriculas.acudiente')->with(array('tipodoc'=>$tipos,'acudiente'=>$datos_A,'name'=>$alum,'tipoR'=>$tipoR,'id_alum'=>$id,'year'=>$year));
			}
		}
	}

	public function matriculados(){

		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		$anos = $this->asign_year();
		
		return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos));
	}

	public function inscritos(){

		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		$anos = $this->asign_year();
		return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'inscritos'=>'1'));
	}

	public function srch_alum_inscritos(){

		$anos = $this->asign_year();
		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		
		if (Input::all()) {
			$data= Input::all();
			$tabla = $this->asignTabla($data['year_matricula']);
			
			if (empty($data['Grados']) && empty($data['name_alum'])) {
				$consulta =$this->_matricula->selectinscritos($tabla);
			}
			
			if (!empty($data['name_alum'])) 
			{
				$consulta =$this->_matricula->selectinscritos_n($tabla,$data['name_alum']);
			}
			
			if (!empty($data['Grados']))
			{
				$consulta =$this->_matricula->selectinscritos_g($tabla,$data['Grados']);
				if (!empty($data['name_alum']))
				{
					$consulta =$this->_matricula->selectinscritos_g_n($tabla,$data['Grados'],$data['name_alum']);
				}
			}

			if (empty($consulta)) {
				return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'mensaje'=>'No hay Alumnos Matriculados','año'=>$data['year_matricula'],'data'=>$data,'inscritos' => '1'));		
			}

			else{
				return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'alumnos'=>$consulta,'año'=>$data['year_matricula'],'data'=>$data,'inscritos' => '1'));
			}
		}

		else{
			echo "Error de Datos";
		}

	}
	
	public function srch_alum_matri(){
		$anos = $this->asign_year();
		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		
		if (Input::all()) {
			$data= Input::all();
			$tabla = $this->asignTabla($data['year_matricula']);
			
			if (empty($data['Grados']) && empty($data['name_alum'])) {
				$consulta =$this->_matricula->selectmatriculados($tabla);
			}
			
			if (!empty($data['name_alum'])) 
			{
				$consulta =$this->_matricula->selectmatriculados_n($tabla,$data['name_alum']);
			}
			
			if (!empty($data['Grados']))
			{
				$consulta =$this->_matricula->selectmatriculados_g($tabla,$data['Grados']);
				if (!empty($data['name_alum']))
				{
					$consulta =$this->_matricula->selectmatriculados_g_n($tabla,$data['Grados'],$data['name_alum']);
				}
			}

			if (empty($consulta)) {
				return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'mensaje'=>'No hay Alumnos Matriculados','año'=>$data['year_matricula'],'data'=>$data));		
			}

			else{
				return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'alumnos'=>$consulta,'año'=>$data['year_matricula'],'data'=>$data));
			}
		}

		else{
			echo "Error de Datos";
		}
	}

	public function edit_matri($id,$año){
		
		$tipos = Tipodoc::all()->lists('name','id');
		
		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		
		$anos = $this->asign_year();

		$tabla = $this->asignTabla($año);

		$datos_alum = $this->_matricula->srch_alum_edit($id,$tabla);
		$datos_alum = get_object_vars($datos_alum[0]);

		return View::Make('matriculas.alum')->with(array('anos' => $anos,'tipodoc'=>$tipos,'grado'=>$grados,'alum'=>$datos_alum,'id_alum'=>$id,'año_matri'=>$año));
	}


	public function cancel_matri($id,$año){
		$grados = Grado::all()->lists('nombre','id');

		array_unshift($grados, "Seleccione Grado");

		$anos = $this->asign_year();

		$tabla = $this->asignTabla($año);


		$delete = $this->_matricula->cancel_matricula($id,$tabla);

		return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'mensaje_cancel'=>'Matricula Cancelada correctamente'));

	}

	public function update_matricula($id,$año){
		$data=Input::all();
		
		$grados = Grado::all()->lists('nombre','id');
		array_unshift($grados, "Seleccione Grado");
		$anos = $this->asign_year();
		
		$tabla = $this->asignTabla($año);
		$update = $this->_matricula->update_matri($id,$tabla,$data);
		
		return View::Make('matriculas.matriculados')->with(array('grados'=>$grados,'anos'=>$anos,'mensaje_update'=>'Matricula Actualizada correctamente'));

	}

	public function savePadre(){
		$data = Input::all();
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');

		if (!empty($data['nombres'])) {
			$nombre = $data['nombres'];
		}else{
			$nombre = $data['nameP'];
		}

		if (!empty($data['datosp'])) {
			$save = $this->_matricula->UpdatePadre($data,$nombre);
			$action ="Actualizado";
		}

		else{
			$save = $this->_matricula->SavePadre($data,$nombre);
			$action ="Guardado";
		}
		$tabla = $this->asignTabla($data['year']);

		if ($data['genero']==1) 
		{
			$id_papa = $this->_matricula->srch_papa_ndoc($data['Num_docP']);
			$id_papa=get_object_vars($id_papa[0]);
			$id_papa=$id_papa['id_padre'];
			$asignalum = $this->_matricula->asignPapa($tabla,$data['id_alum'],$id_papa);
		}
		else
		{
			$id_mama = $this->_matricula->srch_papa_ndoc($data['Num_docP']);
			$id_mama=get_object_vars($id_mama[0]);
			$id_mama=$id_mama['id_padre'];
			$asignalum = $this->_matricula->asignMama($tabla,$data['id_alum'],$id_mama);
		}
		if (!empty($data['tipoR'])) {
			if (!empty($data['codM'])) {
				return View::make('matriculas.info-complementaria')->with(array('save'=>'Se han '.$action.' correctamente los datos del Padre','tipoR' => $data['tipoR'],'name'=>$data['name'],'id_alum'=>$data['id_alum'],'year'=>$data['year'],'action'=>$action,'codM'=>$data['codM']));
			}
			$tabla = $this->asignTabla($data['year']);
			$codM = $this->_matricula->srch_CodM_alum($tabla,$data['id_alum']);
			$codM = get_object_vars($codM[0]);
			$codM = $codM['matricula'];
			return View::make('matriculas.info-complementaria')->with(array('save'=>'Se han '.$action.' correctamente los datos del Padre','tipoR' => $data['tipoR'],'name'=>$data['name'],'id_alum'=>$data['id_alum'],'year'=>$data['year'],'action'=>$action,'codM'=>$codM));
		}
		return View::make('matriculas.info-complementaria')->with(array('save'=>'Se han '.$action.' correctamente los datos del Padre','tipoR' => $data['tipoR'],'name'=>$data['name'],'id_alum'=>$data['id_alum'],'year'=>$data['year'],'action'=>$action));
		
		}

	public function saveAcudiente(){
		$data = Input::all();
		$tipos = Tipodoc::all()->lists('name_tipodoc','id_tipodoc');
		if (!empty($data['datosA'])) {
			$save = $this->_matricula->UpdateAc($data);
			$action ="Actualizado";
		}

		else{
			$save = $this->_matricula->SaveAc($data);
			$action ="Guardado";
		}
		$tabla = $this->asignTabla($data['year']);
		$id_ac = $this->_matricula->srch_acu_token($data['_token']);
		$id_ac=get_object_vars($id_ac);
		$id_ac=$id_ac['id_acudiente'];
		$asignalum = $this->_matricula->asignAcudiente($tabla,$data['id_alum'],$id_ac);
		
		if (!empty($data['codM'])) {
			return View::make('matriculas.info-complementaria')->with(array('save'=>'Se han '.$action.' correctamente los datos del Acudiente','tipoR' => $data['tipoR'],'name'=>$data['name'],'id_alum'=>$data['id_alum'],'year'=>$data['year'],'action'=>$action,'codM'=>$data['codM']));
		}

		return View::make('matriculas.info-complementaria')->with(array('save'=>'Se han '.$action.' los datos del Acudiente','tipoR' => $data['tipoR'],'name'=>$data['name'],'id_alum'=>$data['id_alum'],'year'=>$data['year'],'action'=>$action));
		
		}

	public function searchalum($year){
		$year = $year -1;
		$tabla = $this->asignTabla($year);
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoCompletename(Input::get('term'),$year,$tabla);
			return Response::json($found);
		}
	}
	
	public function srch_papa(){
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoCompleteP(Input::get('term'));
			return Response::json($found);
		}
	}

	public function srch_acudiente(){
		if(Input::get('term'))
		{
			$found = $this->_matricula->autoCompleteA(Input::get('term'));
			return Response::json($found);
		}
	}	

	}

?>