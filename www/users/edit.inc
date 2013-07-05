<!--form-->
<script language="JavaScript" type="text/javascript" src="js/form.js"></script>
<script language="JavaScript" type="text/javascript" src="js/lib/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){			
		//edit	
		validator = $("form[name='edit']").validate({rules:{password2:{equalTo: "#password"}}});	
		$("form[name='edit']").submit(function (){
			submit_form('edit','<?=$module->NAME;?>',show_back);		
			return false;
		});	
		
		$("#change-password").click(function ()
		{
			$(this).hide();
			$("#password-block").show('fast');
			return false;
		});
	});
</script>

<form name="edit" action="" method="post" class="form">
	<label for="title">Логин:</label>
	<input type="text" name="title" value="<?=$item_info['title'];?>" maxlength="255" class="required" />
	<a href="#" id="change-password" style="display: block; margin-top: 10px;">Изменить пароль</a>
	<div id="password-block" style="display: none;">
		<label for="password">Пароль:</label>
		<input id="password" type="password" name="password" value="" maxlength="255" />
		<label for="password2">Пароль еще раз:</label>
		<input id="password2" type="password" name="password2" value="" maxlength="255" />
	</div>
	<label for="email">Адрес email:</label>
	<input type="text" name="email" value="<?=$item_info['email'];?>" maxlength="255" class="required email" />
	
	<button name="submit" type="submit" class="submit">Сохранить изменения</button>
</form>