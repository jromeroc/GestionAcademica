$(document).on('ready',function(){
	$( "#fecha_matricula" ).datepicker({
			changeMonth: true, 
			changeYear: true,
			dateFormat: "yy-mm-dd"
		
	});

	$('#alum').autocomplete({
		method:'get',
		source:root+'matriculas/buscaralum',
		minLenght:2,
		select: function(event,ui)
		{
			$("#id_alum").val(ui.item.id);
		}
	});

});