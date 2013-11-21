<?php
	require_once('init.inc');
	switch ($module->LEVEL)
	{	
			case 3:
				$site->SiteGoTo($module->URL . '/sects.php');
				break;
			case 2:
				$site->SiteGoTo($module->URL . '/cats.php');
				break;
			default: $site->SiteGoTo($module->URL . '/items.php');;
	}
?>