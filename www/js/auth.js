$().ready(function(){
		
	//auth	
	$("form[name='auth']").submit(function (){
		submit_simple_form('auth', 'users', reload);		
		return false;
	});	
		
	$("#logout").click(function ()
	{
		$.post("/users/ajax/logout.php",{}, function(data) { if (data.result == 'ok') reload(); },'json');
		return false;
	});	
});