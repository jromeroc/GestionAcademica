$(document).on('ready',function(){
	$('#btn-alumn-srch').on('click',function(){
		$.ajax({
			url:root+''
		});
	});

	$('#finddocente').autocomplete({
		method:get,
		source:root+'docentes/autcompletar',
		minLenght:2,
		select: function(event,ui)
		{
			$("#iddocente").val(ui.item.id);
		}
	});
});