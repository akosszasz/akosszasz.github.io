<?php defined('SYSPATH') or die('No direct script access.');

class Model_Tamogato extends ORM {

	protected $_table_name = "tamogato";

	protected $_sorting = array("sorrend" => "asc");

	public function latszik(){
		return $this->where("latszik","=",1);
	}

	public function get_kep(){
		$tmp = 'userfiles/tamogato/'.$this->hash;

		if ($this->loaded() && file_exists($tmp) && is_file($tmp)) {
			return $tmp;
		}
		return false;
	}

	public function labels(){
		return array(
			"nev" => "Név",
			"url" => "Link",
			"tamogato" => "Támogató",
			"partner" => "Együttműködő partner",
		);
	}
}
