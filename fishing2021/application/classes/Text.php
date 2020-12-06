<?php defined('SYSPATH') or die('No direct script access.');

/**
* Text
*/
class Text extends Kohana_Text
{
	public static $i;
	public static function clear() {
		self::$i = 0;
	}

	public static function alternate() {
		$i = & self::$i;
		if (func_num_args() === 0)
		{
			$i = 0;
			return '';
		}

		$args = func_get_args();
		return $args[($i++ % count($args))];
	}
}
