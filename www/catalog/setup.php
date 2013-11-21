<?php
	require_once('init.inc');
	
	if ( !file_exists($module->DATA_PATH) )
	{
		mkdir($module->DATA_PATH);
		chmod ($module->DATA_PATH,'777');
		
		mkdir($module->DATA_ITEMS_PATH);
		chmod ($module->DATA_ITEMS_PATH,'777');
	}	
	
	require_once($site->PATH . '/lib/sql.class');
	$sql = new Sql;
	
	//database
	$sql->SqlExecute('CREATE DATABASE IF NOT EXISTS ' . $site->CONFIG['database']['name']);

	if ($module->LEVEL > 2)
	{
		if ( !file_exists($module->DATA_SECTS_PATH) )
		{
			mkdir($module->DATA_SECTS_PATH);
			chmod ($module->DATA_SECTS_PATH,'777');
		}		
		$sql->SqlExecute('CREATE TABLE IF NOT EXISTS `' . $module->NAME . '_sects` (
`id` int(10) unsigned NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`text` text character set utf8 collate utf8_unicode_ci NOT NULL,
`image` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
`access` int(1) NOT NULL default "1",
`rate` int(11) NOT NULL default "450",
PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;');
	}	

	if ($module->LEVEL > 1)
	{
		if ( !file_exists($module->DATA_CATS_PATH) )
		{
			mkdir($module->DATA_CATS_PATH);
			chmod ($module->DATA_CATS_PATH,'777');
		}		
		$sql->SqlExecute('CREATE TABLE IF NOT EXISTS `' . $module->NAME . '_cats` (
`id` int(10) unsigned NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`text` text character set utf8 collate utf8_unicode_ci NOT NULL,
`sect` int(10) unsigned NOT NULL,
`image` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
`access` int(1) NOT NULL default "1",
`rate` int(11) NOT NULL default "450",
PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;');
	}	
	
	$sql->SqlExecute('CREATE TABLE IF NOT EXISTS `' . $module->NAME . '_items` (
`id` int(10) unsigned NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`text` text character set utf8 collate utf8_unicode_ci NOT NULL,
`cat` int(10) unsigned NOT NULL,
`sect` int(10) unsigned NOT NULL,
`price` float NOT NULL default "0",
`image` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
`user` int(10) unsigned NOT NULL,
`ip` varchar(15) character set utf8 collate utf8_unicode_ci NOT NULL,
`date` date NOT NULL,
`access` int(1) NOT NULL default "1",
`rate` int(11) NOT NULL default "350",
PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;');	
?>