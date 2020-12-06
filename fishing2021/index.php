<?php
/*
if($_SERVER['REMOTE_ADDR']!='89.133.86.240'){
	exit;
}
*/



require("common.php");

if (PHP_SAPI == 'cli') // Try and load minion
{
	class_exists('Minion_Task') OR die('Please enable the Minion module for CLI support.');
	set_exception_handler(array('Minion_Exception', 'handler'));

	Minion_Task::factory(Minion_CLI::options())->execute();
}
else
{
	/**
	 * Execute the main request. A source of the URI can be passed, eg: $_SERVER['PATH_INFO']
	 * If no source is specified, the URI will be automatically detected.
	*/
	echo Request::factory(TRUE, array(), FALSE)
		->execute()
		->send_headers(TRUE)
		->body();
}
