<?php	
	require_once($site->PATH . '/lib/confirm.class');
	$confirm = new Confirm;
?>
<!--form-->
<script language="JavaScript" type="text/javascript" src="js/form.js"></script>
<script language="JavaScript" type="text/javascript" src="js/lib/jquery.validate.js"></script>

<script language="JavaScript" type="text/javascript">
	$(document).ready(function(){			
		//feedback	
		validator = $("form[name='feedback']").validate(); 
		$("form[name='feedback']").submit(function (){
			submit_form('feedback','');
			return false;
		});	
	});
</script>
<form name="feedback" action="" method="post">
<table cellpadding="0" cellspacing="5" border="0">
    <tr>
        <td class="middle">Имя</td>
        <td>
            <input name="title" type="Text" maxlength="255" value="" class="required">
        </td>
    </tr>
    <tr>
        <td class="middle">e-mail</td>
        <td>
            <input name="email" type="Text" maxlength="255" value="" class="email required">
        </td>
    </tr>
    <tr>
        <td class="middle" valign="top">Текст</td>
        <td>
            <textarea name="text" rows="7" title="Это поле обязательно для заполнения" class="required"></textarea>
        </td>
    </tr>
    <tr>
        <td class="middle" valign="top">Введите код подтверждения:</td>
        <td>
			<? $confirm->ConfirmView(); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="Submit" value="Отправить">
        </td>
    </tr>
</table>
 </form>