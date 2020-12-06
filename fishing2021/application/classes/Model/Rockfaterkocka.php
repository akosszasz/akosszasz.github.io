<?php defined('SYSPATH') or die('No direct script access.');

class Model_Rockfaterkocka extends ORM {

	protected $_table_name = "rockfaterkocka";

	public function labels() {
		return array(
			"lang" => "Nyelv",
			"cim" => "Cím",
			"rockfater" => "Rockfater",
			"borgyula" => "Bőr Gyula",
			"latszik" => "Látszik",
		);
	}
}
