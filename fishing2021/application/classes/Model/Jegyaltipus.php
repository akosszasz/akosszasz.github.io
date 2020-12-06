<?php defined('SYSPATH') or die('No direct script access.');

class Model_Jegyaltipus extends ORM {

	protected $_table_name = "jegy_altipus";

	protected $_has_many = array(
		"jegy"=>array(
			"model"=>"Jegy",
			"foreign_key"=>"jegy_altipus_id"
		)
	);

	protected $_belongs_to = array(
		"jegytipus"=>array(
			"model"=>"Jegytipus",
			"foreign_key"=>"jegy_tipus_id"
		)
	);

	public function rules(){
		return array(
			'jegy_tipus_id' => array(
				array('not_empty')
			),
			'nev' => array(
				array('max_length', array(':value', 255))
			),
		);
	}

	public function labels(){
		return array(
			"nev" => "Név",
			"jegy_tipus_id" => "Jegy típus",
			"aktiv" => "látszik",
		);
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}
}
