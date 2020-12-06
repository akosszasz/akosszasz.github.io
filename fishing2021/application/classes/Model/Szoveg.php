<?php defined('SYSPATH') or die('No direct script access.');

class Model_Szoveg extends ORM {

	protected $_table_names_plural = false;

	protected $_belongs_to = array(
		'galeria' => array(
			'model' => 'Galeria',
			'foreign_key' => 'galeria_id'
		),
	);

	protected $_has_one = array(
		'menu' => array(
			'model' => 'Menu',
			'foreign_key' => 'szoveg_id'
		),
	);
	
	protected $_has_many = array(
		"dokumentum"=>array(
			"model"=>"Dokumentum",
			"far_key"=>"dokumentum_id",
			"foreign_key"=>"szoveg_id",
			"through"=>"dokumentum2szoveg"
		),
	);

	public function get_link($nyelv = false) {
		if ($this->loaded()) {
			return "/".Route::get('szoveg')->uri(array(
				"nyelv"=>$nyelv!==false ? $nyelv : ((I18N::lang()=='hu' && $this->nyelv==I18n::lang()) ? null : $this->nyelv),
				"link"=>$this->link
			));
		}else{
			return false;
		}

	}

	public function sajatnyelven(){
		return $this->where('nyelv', '=', i18n::lang());
	}
}
