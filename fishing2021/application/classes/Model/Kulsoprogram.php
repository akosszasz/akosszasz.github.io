<?php defined('SYSPATH') or die('No direct script access.');

class Model_Kulsoprogram extends ORM {

	protected $_table_name = "kulsoprogram";

	protected $_sorting = array("sorrend" => "asc");

	protected $_has_many = array(
		"jegy"=>array(
			"model"=>"Jegy",
			"foreign_key"=>"kulsoprogram_id",
			"far_key"=>"jegy_id",
			"through"=>"kulsoprogram2jegy"
		),
	);

	public function get_link() {
		if ($this->loaded()) {
			return "/".Route::get('program')->uri()."/kulso#".$this->link;
		}else{
			return false;
		}

	}

	public function aktiv(){
		return $this->where('aktiv', '=', 1);
	}

	public function get_kep()
	{
		$tmp = 'userfiles/kulsoprogram/'.$this->hash;
		if ($this->loaded() && is_file($tmp) && file_exists($tmp)) {
			return '/'.$tmp;
		}
		return Kohana::$config->load('kepfeltoltes.placeholder');
	}
}
