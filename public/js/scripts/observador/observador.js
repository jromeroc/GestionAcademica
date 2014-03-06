dataAlums= new Array();
var id = 0;
$(document).on('ready',function(){

	
		$( "#datepickerini" ).datepicker({
			changeMonth: true, 
			changeYear: true,
			dateFormat: "yy-mm-dd"
		
		});
	
		$( "#datepickerfin" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: "yy-mm-dd"
		});



	$('#slt_list_grupo').on('click',function(){
		$.ajax({
			url:root+'observador/grupo/'+$('#grupo').val(),
			data:{ id: $('#id_observacion').val() },
			type:'get',
			success:function(data)
			{
				$('#list-body').html(data);
					
				if (dataAlums.length) 
				{
					console.log(dataAlums.length);

					for(var i in dataAlums){

						$("[value="+dataAlums[i]['value']+"]").prop("checked", "checked");
						console.log(dataAlums[i]['value']);
					}
				}
				
				$('#modal-list').modal('show');
				
				selectAll();
				
				$('#select-alums').on('click',function(){
					
					dataAlums = $('input[name="alums[]"]').serializeArray();
					console.log(dataAlums);
					
					$('#modal-list').modal('hide');
					if (dataAlums.length){
					$('#msnalum').html(dataAlums.length+' Alumnos seleccionados').addClass('alert-success').removeClass('alert-danger').fadeIn('slow');	
					}
					else{
						$('#msnalum').html('No se ha Seleccionado ningun alumno').addClass('alert-danger').removeClass('alert-success').fadeIn('slow');	
					}
				});
				
			}

		},'html');

	});
	});



function selectAll()
	{
		$('#select_all').on('change',function(){
			if($(this).is(":checked")){
				
		 		$(".ck").prop("checked", "checked");
		 		
		 	}
		 	else{
				$(".ck").removeAttr("checked");
				
		 	}
		});
	}
