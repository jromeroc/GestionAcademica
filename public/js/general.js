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
	$('#fechaobsv').on('click'){
		alert('Hola')
	});
});
