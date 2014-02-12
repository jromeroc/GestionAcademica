$(document).on('ready',function(){
	
	$('#materia_srch').autocomplete({
		source: root+'materias/buscar',
		method: 'post',
		minLength: 2,
		select: function(event, ui)
        {
        	$("#id_materia").val(ui.item.id);
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

	$('#slt_list_grupo').on('change',function(){
		$.ajax({
			url:root+'alumnos/list_grupo',
			data:{grupo:this.val()},
			type:'post',
			success:function(data)
			{
				$('#modal-list').modal('show');
			}

		},'html');
	});

});
