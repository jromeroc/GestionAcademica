$(document).on('ready',function(){
	$('#select_sesson').on('click', function(){
		$("[name!='periodo']").attr('checked',true);
	});
});