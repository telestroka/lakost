<!--form-->
<script language="JavaScript" type="text/javascript" src="js/form.js"></script>
<script language="JavaScript" type="text/javascript" src="js/lib/jquery.validate.js"></script>
<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){			
		//help	
		validator = $("form[name='help']").validate(); 
		$("form[name='help']").submit(function (){
			submit_form('help','<?=$module->NAME;?>',hide_form);		
			return false;
		});	
	});
</script>

<form name="help" action="" method="post" class="form">
	<label for="email">Адрес email:</label>
	<input type="text" name="email" value="" maxlength="255" class="required email" />
	<div class="comment">Данные для доступа будут отправлены на указанный email.</div>
	<button name="submit" type="submit" class="submit">Отправить</button>
</form>