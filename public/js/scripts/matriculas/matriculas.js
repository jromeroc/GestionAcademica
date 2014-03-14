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
		}
	});

});