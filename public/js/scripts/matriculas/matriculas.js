$(document).on('ready',function(){
	$( "#fecha_matricula" ).datepicker({
			changeMonth: true, 
			changeYear: true,
			dateFormat: "yy-mm-dd"
		
	});

	$('#alum').autocomplete({
		method:'get',
		source:root+'matriculas/buscaralum/'+$("#year_matricula").val(),
		minLenght:2,
		select: function(event,ui)
		{
		}
	});

});