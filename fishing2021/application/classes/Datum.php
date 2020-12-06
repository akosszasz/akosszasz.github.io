<?php defined('SYSPATH') or die('No direct script access.');

/**
*
*/
class Datum
{
	public static function formaz($datum,$formatum = "%Y. %B %d.&nbsp;%H:%M") {
		$time = strtotime($datum);

		if ($formatum == "c") {
			return date("c",$time);
		}

		if (strftime("%H:%M",$time) == "00:00") {
			if ($formatum != "%H:%M") {
				$formatum = str_replace("%H:%M", "", $formatum);
			}else {
				return "";
			}
		}

		if ($time>0) {
			return strftime(__($formatum),$time);
		}else {
			return "";
		}
	}
}
