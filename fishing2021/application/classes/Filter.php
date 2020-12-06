<?php defined('SYSPATH') or die('No direct script access.');

class Filter {

	public static function null($value)
	{
		return (empty($value) ? NULL : $value);
	}

}
