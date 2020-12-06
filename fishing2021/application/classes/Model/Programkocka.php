<?php defined('SYSPATH') or die('No direct script access.');

class Model_Programkocka extends ORM {

	protected $_table_name = "programkocka";

	public function labels() {
		return array(
			"headline1" => "Headline",
			"headline2" => "Headline 2",
		);
	}
}
