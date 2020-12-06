<?php defined('SYSPATH') or die('No direct script access.');

class Model_Hir extends ORM {

	protected $_table_name = "hir";
	protected $_sorting = array('datum'=>'DESC');
	protected $_forditasok;

	protected $_has_many = array(
		"fordit"=>array(
			"model"=>"Hirfordit",
			"foreign_key"=>"hir_id"
		),
		"cimke"=>array(
			"model"=>"Cimke",
			"foreign_key"=>"hir_id",
			"far_key"=>"cimke_id",
			"through"=>"cimke2hir"
		),
		"dokumentum"=>array(
			"model"=>"Dokumentum",
			"foreign_key"=>"hir_id",
			"far_key"=>"dokumentum_id",
			"through"=>"dokumentum2hir"
		),
	);

	protected $_belongs_to = array(
		"galeria"=>array(
			"model"=>"Galeria",
			"foreign_key"=>"galeria_id"
		)
	);

	public function forditva($lang = null)
	{
		if ($lang == null) {
			$lang = I18n::lang();
		}
		if ( ! isset($this->_forditasok[$lang])) {
			$this->_forditasok[$lang] = $this->fordit->where("lang","=",$lang)->find();
		}
		return $this->_forditasok[$lang];
	}

	public function latszik()
	{
		return $this->where("datum","<=",date("Y-m-d"))->where("datum",">","2020-01-01");
	}

	public function get_kep()
	{
		$tmp = 'userfiles/hirek/'.$this->hash;
		if ($this->loaded() && is_file($tmp) && file_exists($tmp)) {
			return '/'.$tmp;
		}
		return Kohana::$config->load('kepfeltoltes.placeholder');
	}

	public function get_sliderkep()
	{
		$tmp = 'userfiles/hirek/'.$this->id.'/slider/'.$this->slider;
		if ($this->loaded() && is_file($tmp) && file_exists($tmp)) {
			return $tmp;
		}
		return false;
	}

	public function get_link()
	{
		return Route::get("hir")->uri(array(
			'controller'=>'hirek',
			'action'=>'hir',
			'id'=>$this->id,
			'cim'=>URL::title($this->forditva()->cim,'-',true),
		));
	}


	public function cimkek() {
		$cimkek = $this->cimke->find_all();
		$cimkek_array = array();
		foreach ($cimkek as $key => $cimke) {
			$class = "tag label label-info";

			$cimkek_array[] = array("id"=>$cimke->id,'text'=>$cimke->nev, 'class'=>$class);
		}

		return json_encode($cimkek_array);
	}

	public function save_cimkek($meglevo_cimkek, $uj_cimkek, $model) {
		$this->save_many($meglevo_cimkek, $uj_cimkek, $model);
	}

} // End Hir
