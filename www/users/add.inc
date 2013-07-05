<!--form-->
<script language="JavaScript" type="text/javascript" src="js/form.js"></script>
<script language="JavaScript" type="text/javascript" src="js/lib/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){			
		//add	
		validator = $("form[name='add']").validate({rules:{password2:{equalTo: "#password"}}});	
		$("form[name='add']").submit(function (){
			submit_form('add','<?=$module->NAME;?>',back);		
			return false;
		});	
	});
</script>

<form name="add" action="" method="post" class="form">
	<label for="title">Логин:</label>
	<input type="text" name="title" value="" maxlength="255" class="required" />
	<label for="password">Пароль:</label>
	<input id="password" type="password" name="password" value="" maxlength="255" class="required" />
	<label for="password2">Пароль еще раз:</label>
	<input id="password2" type="password" name="password2" value="" maxlength="255" class="required" />
	<label for="email">Адрес email:</label>
	<input type="text" name="email" value="" maxlength="255" class="required email" />
	
	<button name="submit" type="submit" class="submit">Зарегистрировать</button>
</form>