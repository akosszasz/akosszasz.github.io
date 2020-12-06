<?php defined('SYSPATH') or die('No direct script access.');

class Model_Jegytipus extends ORM {

	protected $_table_name = "jegy_tipus";

	protected $_has_many = array(
		"jegy"=>array(
			"model"=>"Jegy",
			"foreign_key"=>"jegy_tipus_id"
		)
	);

	public function rules(){
		return array(
			'szoveg_cim' => array(
				array('max_length', array(':value', 255))
			),
		);
	}

	public function labels(){
		return array(
			"nev" => "Név",
			"szoveg_cim" => "Szöveg címe",
			"szoveg" => "Szöveg",
			"link" => "Link",
			"aktiv" => "látszik",
		);
	}

	public function get_link(){
		return "jegyek/".$this->link;
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}
}
