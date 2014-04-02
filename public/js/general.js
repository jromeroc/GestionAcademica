$(document).on('ready',function(){
	
	$('#materia_srch').autocomplete({
		source: root+'materias/buscar',
		method: 'post',
		minLength: 2,
		select: function(event, ui)
        {
        	$("#materia").val(ui.item.id);
        }
	});

	$('#docente_srch').autocomplete({
		method:'get',
		source:root+'docentes/buscar',
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_docente").val(ui.item.id);
		}
	});

	$('#alum_srch').autocomplete({
		method:'get',
		source:root+'alumnos/buscar',
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_alumno").val(ui.item.id);
		}
	});

	$('#pais_srch').autocomplete({
		
		method:'get',
		source:root+'location/buscarpais',
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_pais").val(ui.item.id);
		}
	});

	$('#city_srch').autocomplete({		
		method:'get',
		source:root+'location/buscarciudad',
		data: {country: $('#id_pais').val()},
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_city").val(ui.item.id);
		}
	});

	$('#city_exp').autocomplete({		
		method:'get',
		source:root+'location/buscarciudadU',
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_city_exp").val(ui.item.id);
		}
	});

	$('#message-success').fadeOut(5000);
});