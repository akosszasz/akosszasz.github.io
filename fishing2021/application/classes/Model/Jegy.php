<?php defined('SYSPATH') or die('No direct script access.');

class Model_Jegy extends ORM {

	protected $_table_name = "jegy";

	protected $_sorting = array("sorrend" => "asc");

	protected $_belongs_to = array(
		"tipus"=>array(
			"model"=>"Jegytipus",
			"foreign_key"=>"jegy_tipus_id"
		),
		"altipus"=>array(
			"model"=>"Jegyaltipus",
			"foreign_key"=>"jegy_altipus_id"
		),
	);

	public function rules(){
		return array(
			'nev' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'ar' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'jegy_tipus_id' => array(
				array('not_empty'),
			),
		);
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}

	public function labels(){
		return array(
			"nev" => "Név",
			"leiras" => "Leírás",
			"jegy_tipus_id" => "Típus",
			"ar" => "Ár",
			"link" => "Link",
			"elfogyott" => "elfogyott",
			"aktiv" => "látszik",
		);
	}
}
