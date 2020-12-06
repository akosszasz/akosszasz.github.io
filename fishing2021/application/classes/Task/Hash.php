<?php defined('SYSPATH') or die('No direct script access.');

/**
*
*/
class Task_Hash extends Minion_Task
{
	protected function _execute(array $params) {
		$pwd = Minion_CLI::read('password');
		echo Auth::instance()->hash($pwd)."\n";
		exit;
	}
}