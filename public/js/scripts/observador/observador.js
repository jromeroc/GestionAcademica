$(document).on('ready',function(){
	$('#slt_list_grupo').on('click',function(){
		$.ajax({
			url:root+'observador/grupo/'+$('#grupo').val(),
			type:'post',
			success:function(data)
			{
				$('#modal-list').modal('show');
			}

		},'html');
	});
	});
