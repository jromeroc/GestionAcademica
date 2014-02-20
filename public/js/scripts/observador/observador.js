var dataAlums;

$(document).on('ready',function(){
	
	$('#slt_list_grupo').on('click',function(){
		$.ajax({
			url:root+'observador/grupo/'+$('#grupo').val(),
			type:'get',
			success:function(data)
			{
				$('#list-body').html(data);
				$('#modal-list').modal('show');
				selectAll();
				$('#ProcessD').on('click',function(){
					//$('input[name="select_all[]"]').serialize();
					dataAlums = $('input[name="alums[]"]').serializeArray();
					//alert(dataAlums.length);
					console.log(dataAlums);
					$('#modal-list').modal('hide');
					
					$('#msnalum').html(dataAlums.length+' Alumnos seleccionados');
					/*
					for(var i in dataAlums)
					{
						for (var j in i)
						{
  							alert('El valor de arr['+i+'] = ' + i[j]);
							
						}
  					}
  					*/
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
