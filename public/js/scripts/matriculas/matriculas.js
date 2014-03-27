$(document).on('ready',function(){
	
	$( "#fecha_matricula" ).datepicker({
			changeMonth: true, 
			changeYear: true,
			dateFormat: "yy-mm-dd"
		
	});

	$('#Matricula').on('click',function(){
			$('#fecha').fadeIn();
	});

	$('#Inscripcion').on('click',function(){		
		$('#fecha').fadeOut();
	});

	$('#alum').autocomplete({
		method:'get',
		source:root+'matriculas/buscaralum/'+$("#year_matricula").val(),
		minLenght:2,
		select: function(event,ui) 
		{
			$("#id_alum").val(ui.item.id);
			$("#alum").val(ui.item.names);
			$("#fname").val(ui.item.fname);
			$("#lnane").val(ui.item.lname);
			$("#tipo_doc").val(ui.item.tipo_document);
			$("#n_document").val(ui.item.num_document);
			$("#pais_srch").val(ui.item.name_pais);
			$("#id_pais").val(ui.item.id_pais);
			$("#id_city_exp").val(ui.item.exp_document);
			$("#city_exp").val(ui.item.nombre_ciudad);
			$("#city_srch").val(ui.item.nombre_ciudad);
			$("#id_city").val(ui.item.id_ciudad);
			$("#genero[value='"+ui.item.sexo+"']").prop("checked", true);				
			$("#g_sang").val(ui.item.grupo_san);
			$("#eps").val(ui.item.eps);
			$("#RH[value='"+ui.item.rh+"']").prop("checked", true);				
			$("#T-Herm[value='"+ui.item.tipo_hermano+"']").prop("checked", true);				
			$("#direcc").val(ui.item.direccion);
			$("#papa").val(ui.item.papa);
			$("#mama").val(ui.item.mama);
			$("#acudiente").val(ui.item.acudiente);
			$("#cel").val(ui.item.celular);
			$("#fijo").val(ui.item.telefono);
			$("#email").val(ui.item.mail);
			$("#fecha_nac").val(ui.item.date_born);
		}
	});
	$( "#fecha_nac" ).datepicker({
			changeMonth: true, 
			changeYear: true,
			dateFormat: "yy-mm-dd"
		
	});

	$('#nameP').autocomplete({		
		type: "get",
		source:root+'matriculas/buscar_padre',
		select: function(event,ui){
			$("#datosp").val(ui.item.id);
			$("#nameP").val(ui.item.nombres_padre);
			$("#fnameP").val(ui.item.apel1_padre);
			$("#lnameP").val(ui.item.apel2_padre);
			$("#tipo_docP").val(ui.item.id_tipodoc_padre);
			$("#Num_docP").val(ui.item.numdoc_padre);
			$("#profP").val(ui.item.profesion_padre);
			$("#ocP").val(ui.item.ocupacion_padre);
			$("#empP").val(ui.item.empresa_padre);
			$("#fijoP").val(ui.item.tel_casa_padre);
			$("#celP").val(ui.item.celular_padre);
			$("#emailP").val(ui.item.email_padre);	
		}
	});

	$('#nameM').autocomplete({		
		type: "get",
		source:root+'matriculas/buscar_padre',
		select: function(event,ui){
			$("#datosm").val(ui.item.id);
			$("#nameP").val(ui.item.nombres_padre);
			$("#fnameP").val(ui.item.apel1_padre);
			$("#lnameP").val(ui.item.apel2_padre);
			$("#tipo_docP").val(ui.item.id_tipodoc_padre);
			$("#Num_docP").val(ui.item.numdoc_padre);
			$("#profP").val(ui.item.profesion_padre);
			$("#ocP").val(ui.item.ocupacion_padre);
			$("#empP").val(ui.item.empresa_padre);
			$("#fijoP").val(ui.item.tel_casa_padre);
			$("#celP").val(ui.item.celular_padre);
			$("#emailP").val(ui.item.email_padre);	
		}
	});

	$('#nameA').autocomplete({		
		type: "get",
		source:root+'matriculas/buscar_acudiente/'+$('#datosA').val(),
		select: function(event,ui){
			$("#datosA").val(ui.item.id);
			$("#nameA").val(ui.item.nombre_acudiente);
			$("#ParentA").val(ui.item.parentesco_acudiente);
			$("#telA").val(ui.item.telefono_acudiente);
			$("#celA").val(ui.item.celular_acudiente);
			$("#telOfA").val(ui.item.teloficina_acudiente);
		}
	});

});