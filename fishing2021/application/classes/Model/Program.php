<?php defined('SYSPATH') or die('No direct script access.');

class Model_Program extends ORM {

	public $_forditasok = array();

	protected $_table_name = "program";

	protected $_has_many = array(
		"fordit"=>array(
			"model"=>"Programfordit",
			"foreign_key"=>"program_id"
		),
		"dokumentum"=>array(
			"model"=>"Dokumentum",
			"foreign_key"=>"program_id",
			"far_key"=>"dokumentum_id",
			"through"=>"dokumentum2program"
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
		return $this->where("latszik","=",1);
	}

	public function get_link() {
		if ($this->loaded()) {
			return Route::get("program")->uri(array(
				'uri'=>__('program'),
				'nyelv'=>I18n::lang(),
				'id'=>$this->id,
				'cim'=>URL::title($this->forditva()->cim,'-',true)
			));
		}else{
			return false;
		}
	}

	public function get_kep()
	{
		$tmp = 'userfiles/programok/'.$this->id.'/th/'.$this->hash;
		if ($this->loaded() && file_exists($tmp)) {
			return $tmp;
		}
		return Kohana::$config->load('kepfeltoltes.placeholder');
	}

	public function get_nagykep()
	{
		$tmp = '/userfiles/programok/'.$this->id.'/'.$this->hash;
		if ($this->loaded() && file_exists($tmp)) {
			return $tmp;
		}
		return false;
	}

} // End Program
