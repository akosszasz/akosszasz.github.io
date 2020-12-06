<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sajtofoto extends ORM {

	protected $_table_name = "sajtofoto";

	protected $_sorting = array('sorrend'=>'ASC');
	
	public function get_kep() {
		if ($this->loaded()) {
			$tmp = 'userfiles/sajtofoto/'.$this->hash;
			if (file_exists($tmp) && is_file($tmp)) {
				return $tmp;
			}
		}
		return false;
	}

	public function get_kiskep() {
		if ($this->loaded()) {
			$tmp = 'userfiles/sajtofoto/th/'.$this->hash;
			if (file_exists($tmp) && is_file($tmp)) {
				return $tmp;
			}
		}
		return false;
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}

}
