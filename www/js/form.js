function hide_form(form_name)
{
	var form = $("form[name='"+form_name+"']");
	form.hide();
	form.after('<p>Спасибо, ваши данные приняты.<br/><br/><input type="button" value="Отправить еще раз" onclick="show_form(\''+form_name+'\')"/></p>');
	return true;
}

function show_form(form_name)
{
	var form = $("form[name='"+form_name+"']");
	document.forms[form_name].reset()
	form.next().remove();	
	form.show();
	return true;
}

function back()
{
	window.location = document.referrer;
	return true;
}

function show_back(form_name)
{
	var form = $("form[name='"+form_name+"']");
	form.hide();
	form.after('<p>Спасибо, данные изменены.<br/><br/><input type="button" value="Вернуться назад" onclick="history.back()"/></p>');
	return true;
}

function submit_form(form_name, module, result_function)
{
	result_function = result_function || hide_form;
	//if (validator == undefined) { var validator = $("form[name='"+form_name+"']").validate(); }
	if (validator.numberOfInvalids() > 0) return false;
	
	show_loader();
	
	//url
	var url = "/"+module+"/ajax/"+form_name+".php";
	if (module == '') url = "/ajax/"+form_name+".php";
	
	//url params
	var query = new Object();
	 $("form[name='"+form_name+"'] *[name]").each(function(){
		if ($(this).attr('type') == 'checkbox') query[$(this).attr('name')] = ($(this).attr('checked')) ? 1 : 0;
		else if ($(this).attr('type') == 'radio') query[$(this).attr('name')] = $("input[name='"+$(this).attr('name')+"']:checked").val();
		else query[$(this).attr('name')] = $(this).val();
	  });

	$.post(url, query , function(data){
		if (data.result == 'ok')
		{
			result_function(form_name);
		}
		else
		{
			$.each(data.errors, function(field,error){
				var query = new Object();
				query[field] = error;
				validator.showErrors(query);
			});
		}
		hide_loader();
	},'json');
}

function submit_simple_form(form_name, module, result_function)
{
	show_loader();
	
	//url
	var url = "/"+module+"/ajax/"+form_name+".php";
	if (module == '') url = "/ajax/"+form_name+".php";
	
	//url params
	var query = new Object();
	 $("form[name='"+form_name+"'] *[name]").each(function(){
		if ($(this).attr('type') == 'checkbox') query[$(this).attr('name')] = ($(this).attr('checked')) ? 1 : 0;
		else if ($(this).attr('type') == 'radio') query[$(this).attr('name')] = $("input[name='"+$(this).attr('name')+"']:checked").val();
		else query[$(this).attr('name')] = $(this).val();
	  });

	$.post(url, query , function(data){
		if (data.result == 'ok')
		{
			result_function(form_name);
		}
		else
		{
			var errors = '';
			$.each(data.errors, function(field,error){
				errors += error + "\n";
			});
			alert(errors);
		}
		hide_loader();
	},"json");
}