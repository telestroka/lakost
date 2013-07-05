<table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr valign="top">
        <td valign="top" style="padding: 30px;">
            <b class="light">Отправить сообщение</b><br/><br/>
            <? include_once($site->PATH . '/inc/feedback.inc'); ?>
            <div style="width:290px; height:0px;"><span></span></div>
        </td>
        <td width="100%" style="padding: 30px 30px 30px 0;">
            <table cellpadding="0" cellspacing="0" border="0">
                <tr valign="top">
					<?
						$num_sects = count($sects);
						if ($num_sects)
						{
							$i = 0; $td1 = $td2 = '';
							foreach ($sects as $sect_id => $sect_params)
							{
								$i++;
								if ($i <= $num_sects / 2)
									$td1 .= '<a href="/catalog/cats.php?sect=' . $sect_id . '" class="text-main">' . $sect_params['title'] . '</a><br/>';
								else
									$td2 .= '<a href="/catalog/cats.php?sect=' . $sect_id . '" class="text-main">' . $sect_params['title'] . '</a><br/>';
							}
							echo '<td>' . $td1 . '</td><td style="padding-left: 50px;">' . $td2 . '</td>';		
						}
						else echo '<td>Разделов нет</td>';
					?>
                </tr>
            </table>
			<div style="margin-top: 40px; font-size: 18px">
				<a class="light">Новинка!</a> Коллекция «Каригуз Де Люкс» (<a href="/PresentationDeLuxe.ppt">скачать презентацию</a>)
			</div>
        </td>
    </tr>
</table>