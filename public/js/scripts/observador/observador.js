$(document).on('ready',function(){
	$('#slt_list_grupo').on('click',function(){
		$.ajax({
			url:root+'observador/grupo/'+$('#grupo').val(),
			type:'get',
			success:function(data)
			{
				$('#list-body').html(data);
				$('#modal-list').modal('show');
			}

		},'html');
	});
});
