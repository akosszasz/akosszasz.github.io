<?php defined('SYSPATH') or die('No direct script access.');

class Model_Slider extends ORM {

	protected $_table_name = "slider";

	protected $_sorting = array("sorrend" => "asc");

	protected $_has_many = array(
		"fordit"=>array(
			"model"=>"Sliderfordit",
			"foreign_key"=>"slider_id"
		),
	);

	public $_forditasok = array();

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

	public function latszik(){
		return $this->where("latszik","=",1);
	}

	public function get_kep(){
		$tmp = 'userfiles/slider/'.$this->hash;

		if ($this->loaded() && file_exists($tmp) && is_file($tmp)) {
			return $tmp;
		}
		return false;
	}
	
	public function get_cim(){
		if($this->hir->loaded()){
			return $this->hir->forditva()->cim;
		}
		
		if($this->program->loaded()){
			return $this->program->forditva()->cim;
		}
		
		return null;
	}
	
	public function get_lead(){
		if($this->hir->loaded()){
			return $this->hir->forditva()->lead;
		}
		
		if($this->program->loaded()){
			return $this->program->forditva()->lead;
		}
		
		return null;
	}
	
	public function get_datum(){
		if($this->hir->loaded()){
			return strftime("%Y. %B %d.", strtotime($this->hir->datum));
		}
		
		if($this->program->loaded()){
			$datum = strftime("%Y. %B %d.", strtotime($this->program->datum));
			
			if($this->program->vege){
				$vege = strftime("%Y. %B %d.", strtotime($this->program->vege));
			}
			return $datum.(isset($vege) ? " - ".$vege : null);
		}
		
		return null;
	}
	
	public function get_link(){
		if($this->hir->loaded()){
			return $this->hir->get_link();
		}
		
		if($this->program->loaded()){
			return $this->program->get_link();
		}
		
		return null;
	}

} // End Slider
