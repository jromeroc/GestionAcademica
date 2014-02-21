dataAlums= new Array();

$(document).on('ready',function(){	
	$('#slt_list_grupo').on('click',function(){
		$.ajax({
			url:root+'observador/grupo/'+$('#grupo').val(),
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
					//$('input[name="select_all[]"]').serialize();
					dataAlums = $('input[name="alums[]"]').serializeArray();
					//alert(dataAlums.length);
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
