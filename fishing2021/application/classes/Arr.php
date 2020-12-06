<?php defined('SYSPATH') or die('No direct script access.');

/**
* Arr
*/
class Arr extends Kohana_Arr
{

	public static function fill($start=0,$stop=20) {
		$ret = array();

		if ($start<$stop) {
			for ($i=$start; $i <= $stop; $i++) {
				$ret[$i] = $i;
			}
		}else {
			for ($i=$start; $i >= $stop; $i--) {
				$ret[$i] = $i;
			}
		}
		return $ret;
	}
}
