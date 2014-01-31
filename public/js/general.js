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
	
});