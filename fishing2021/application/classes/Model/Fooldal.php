<?php defined('SYSPATH') or die('No direct script access.');

class Model_Fooldal extends ORM {

	protected $_table_name = "fooldal";

	public function latszik(){
		return $this->where("aktiv","=",1);
	}

	public function rules() {
		return array(
			'headline' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'headline2' => array(
				array('max_length', array(':value', 255))
			),
		);
	}
}
