<?php
	require_once('init.inc');
	
	if ( !file_exists($module->DATA_PATH) )
	{
		mkdir($module->DATA_PATH);
		chmod ($module->DATA_PATH,'777');
	}
	
	require_once($site->PATH . '/lib/sql.class');
	$sql = new Sql;
	
	//database
	$sql->SqlExecute('CREATE DATABASE IF NOT EXISTS ' . $site->CONFIG['database']['name']);
	
	$sql->SqlExecute('CREATE TABLE IF NOT EXISTS `' . $module->NAME . '` (
`id` int(10) unsigned NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`email` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
`ip` varchar(15) character set utf8 collate utf8_unicode_ci NOT NULL,
`date` date NOT NULL,
`access` int(1) NOT NULL default "1",
`rate` int(11) NOT NULL default "450",
PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;');

$sql->SqlExecute('INSERT IGNORE INTO `' . $module->NAME . '` (`id`, `title`, `password`, `email`, `ip`, `date`, `access`, `rate`) VALUES ("1", "admin", "7ab1ba354a8838c158458a17310417b2", "ms@ensk.ru", "127.0.0.1", "' . date('Y-m-d') . '", 2, 550);');
?>