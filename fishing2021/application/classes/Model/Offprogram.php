<?php defined('SYSPATH') or die('No direct script access.');

class Model_Offprogram extends ORM {

	protected $_table_name = "offprogram";

	protected $_sorting = array("sorrend" => "asc");

	protected $_has_many = array(
		"jegy"=>array(
			"model"=>"Jegy",
			"foreign_key"=>"offprogram_id",
			"far_key"=>"jegy_id",
			"through"=>"offprogram2jegy"
		),
	);

	public function get_link()
	{
		return Route::get("nemzene-cikk")->uri(array(
			'controller'=>'nemzene',
			'action'=>'cikk',
			'id'=>$this->id,
			'cim'=>URL::title($this->cim,'-',true),
		));
	}

	public function aktiv(){
		return $this->where('aktiv', '=', 1);
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}

	public function get_kep() {
		$tmp = 'userfiles/nemzene/'.$this->hash;
		if ($this->loaded() && is_file($tmp) && file_exists($tmp)) {
			return '/'.$tmp;
		}
		return Kohana::$config->load('kepfeltoltes.placeholder');
	}

}
