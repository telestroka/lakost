<div class="h10"><br/></div>
<?
$demo = 0;
function img($names, $mode=1)
{
	global $demo;
	$demo = 1;
	foreach ($names as $name)
		if ($mode == 1) echo '<a href="i/demo/bg_' . $name . '.jpg" rel="lightbox"><img src="i/demo/sm_' . $name . '.jpg" border="0" alt="" style="margin-right: 5px;"/></a>';
		if ($mode == 2) echo '<a href="i/demo/pb_' . $name . '.jpg" rel="lightbox"><img src="i/demo/ps_' . $name . '.jpg" border="0" alt="" style="margin-right: 5px;"/></a>';
		if ($mode == 2) echo '<a href="i/demo/pol_' . $name . '.jpg" rel="lightbox"><img src="i/demo/p_pol_' . $name . '.jpg" border="0" alt="" style="margin-right: 5px;"/></a>';
		
}
switch ($cat)
{
	case 83: img(array(239,243)); break;
	case 96: img(array(231)); break;
	case 105: img(array('014','046','052',17060920,17060921)); break;
	case 158: img(array('044','072','076','079','084',222,229,246)); break;
	case 206: img(array(142,147,148,150)); break;
	case 232: img(array(205,'050609006')); break;
	case 243: img(array(17060901,17060902,17060903)); break;
	case 248: img(array(269)); break;
	case 313: img(array(275,276,277)); break;
	case 327: img(array(160,163,185,190,193,208,'050609001','050609002')); break;
	case 376: img(array(272,'050609003')); break;
	case 383: img(array(263)); break;
	case 399: img(array(258,261)); break;
	case 403: img(array(124,22060907,22060908,22060909,22060910)); break;
	case 493: img(array(22060901,22060902,22060903,22060904)); break;
	case 462: img(array('01','02','03'),2); break;
	case 516: img(array(170,171)); break;
	case 791: img(array('094',127,129,131,134,135,136,138,141,161,165,166,169,22060925,22060926,22060927)); break;
	case 851: img(array(22060918,22060919,22060920,22060921,22060922,22060923,22060924)); break;
	case 966: img(array('097')); break;
	case 1050: img(array(217,220,22060932,22060933,22060934)); break;
	case 1118: img(array(17060922,17060923,17060924,17060925,17060926,17060927)); break;
	case 1262: img(array(212)); break;
	case 1322: img(array(236,278,279,280,281)); break;
	case 1453: img(array('067','069','082')); break;
	case 1475: img(array(1,2,3),2); break;
	case 1475: img(array(22060928,22060929,22060930)); break;
	case 1480: img(array(204,210,'050609009')); break;
	case 1503: img(array(100,101,104,105,109,112,114,116,121,30010,30011,17060913)); break;
	case 1613: img(array(268)); break;
	case 1647: img(array('050609008')); break;
	case 1652: img(array(17060906,17060907)); break;
	case 1672: img(array(22060905,22060906)); break;
	case 1681: img(array(252,253,255)); break;
	case 1688: img(array('025','037')); break;
	case 1749: img(array('050609004','050609005')); break;
	case 1764: img(array(174,175,176)); break;
	case 1797: img(array(30012,30013,30014,30015)); break;
	case 1827: img(array(30016,30017,30018)); break;
	case 1850: img(array(216)); break;
	case 1867: img(array(22060931)); break;
	case 1879: img(array('050609007')); break;
	case 1897: img(array(3101,3102,3103,3104,3105,3106,3107)); break;
	case 1912: img(array(301,302,303,304,310,311,312,313,314)); break;
	case 1924: img(array(17060914,17060915,17060916,17060917,17060918,17060919)); break;
	case 1935: img(array('002','003','004','007','018','038','054','064','087','093',248,14110901)); break;
	case 1987: img(array('050609015','050609016','050609017','050609018','050609019')); break;
	case 1993: img(array(305,306,307,308,309)); break;
	case 2073: img(array(17060904,17060905)); break;
	case 2081: img(array('050609004', '050609005')); break;
	case 2149: img(array(3201,3202,3203,3204,3205,3206,3207,3208)); break;
	case 2240: img(array('17060910','17060911','17060912')); break;
	case 2248: img(array(30019,30020,30021,30022,30023,30024,30025,30026,30027,30028,30029,30030,30031,30032,30033,30034,30035,30036,30037,30038,30039,30040,30041,30042,30043,30044,30045,30046,30047,30048,30049,30050,30051,30052,30053,30054,30055,30056,30057,30058,30059,30060,30061,30062,30063,30064,30065,30066,30067,30068,30069,30070,30071,30072)); break;
	case 2263: img(array('050609020','050609021')); break;
	case 2266: img(array(17060909,17060908)); break;
	case 2363: img(array(22060911,22060912,22060913,22060914,22060915,22060916,22060917)); break;
	case 2478: img(array(22060935,22060936,22060937,22060938,22060939,22060940)); break;
	case 2523: img(array(20110901,20110902,20110903)); break;
	case 2627: img(array(30001,30002,30003,30004)); break;
	case 2643: img(array('050609010','050609011','050609012','050609013','050609014')); break;
	case 2680: img(array(16060901,16060902,16060903,16060904)); break;	
}
if ($demo == 1) echo '<div class="separator" style="margin-left: -130px;"><span></span></div>';
?>

<table cellpadding="0" cellspacing="0" class="data-table">
	<?
		if (count($items))
		{
			foreach ($items as $item_id => $item_params)
			{
				echo '<tr id="item' . $item_id . '">';
				echo '<td>';
					if ($item_params['image'] != '') {
						$image = rawurlencode(iconv("UTF-8", "windows-1251", $item_params['image'])); 
						echo '<a href="' . $module->DATA_URL . '/items/' . $image . '" rel="lightbox">';
					}
					echo $item_params['title'];
					if ($item_params['image'] != '') echo '</a>';
				echo '</td>';
				echo '<td class="right">' . $item_params['price'] . 'р.</td>';
					if ($_SESSION['auth']['access'] > 1 || ( $_SESSION['auth']['access'] > 0 && $item_params['user'] == $_SESSION['auth']['id'])) 
						echo '<td class="right"><a href="' . $module->URL . '/edit.php?item=' . $item_id . '">редактировать</td>
							<td class="right"><a class="delete-item" href="#">удалить</a></td>
							<td class="comment right">' . $item_params['rate'] . '</td>
							<td class="right admin-arrow admin-arrow-up" title="увеличить рейтинг на единицу">&uarr;</td>
							<td class="right admin-arrow admin-arrow-down" title="уменьшить рейтинг на единицу">&darr;</td>';
				echo '</tr>';
			}
		}
		else echo '<tr><td>Данных нет</td></tr>';
	?>
</table>
<div id="end"></div>
<?
	if (isset($pager))$pager->PagerShow();
	if ($_SESSION['auth']['access'] > 1) echo '<div class="separator" style="margin-bottom: 20px; margin-left: -130px;"><span></span></div><a href="' . $module->URL . '/add.php?cat=' . $cat . '">Добавить товар</a>';
?>
<script language="JavaScript" type="text/javascript">
	$(".delete-item").click(function (){
		var item = $(this).parents('tr').attr("id").replace("item","");		
		
		$.post("<?=$module->AJAX_URL;?>/delete.php",{item:item}, function(data){
			if (data.result == 'ok')
			{
				$("#item"+item).hide();
			}
			else
			{
				alert("Невозможно удалить товар.");
			}
		},'json');
		return false;
	});
	$(".admin-arrow-up").click(function (){
		var item = $(this).parents('tr').attr("id").replace("item","");		
		
		$.post("<?=$module->AJAX_URL;?>/up.php",{item:item}, function(data){
			window.location = window.location;
		},'json');
		return false;
	});
	$(".admin-arrow-down").click(function (){
		var item = $(this).parents('tr').attr("id").replace("item","");		
		
		$.post("<?=$module->AJAX_URL;?>/down.php",{item:item}, function(data){
			window.location = window.location;
		},'json');
		return false;
	});
</script>