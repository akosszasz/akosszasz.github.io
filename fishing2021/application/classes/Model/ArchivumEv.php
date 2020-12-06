<?php defined('SYSPATH') or die('No direct script access.');

class Model_ArchivumEv extends ORM {

	protected $_table_name = "archivum_ev";
	protected $_sorting = array('id'=>'ASC');

	protected $_has_many = array(
		"szinpad"=>array(
			"model"=>"ArchivumSzinpad",
			"foreign_key"=>"archivum_ev_id"
		),
		"video"=>array(
			"model"=>"ArchivumVideo",
			"foreign_key"=>"archivum_ev_id",
		),
	);

	protected $_belongs_to = array(
		"kiemelt_video" => array(
			"model" => "ArchivumVideo",
			"foreign_key" => "kiemelt_video_id",
		),
	);

	public function get_kiemelt_video(){
		if(!$this->loaded()) return false;

		if($this->kiemelt_video->loaded()){
			return $this->kiemelt_video;
		} else {
			return ORM::factory("ArchivumVideo")->where("archivum_ev_id", "=", $this->id)->find();
		}
	}

	public function latszik() {
		return $this->where("aktiv","=","1");
	}

	public function get_kep(){
		$tmp = 'userfiles/archivum_ev/'.$this->hash;
		if ($this->loaded() && is_file($tmp) && file_exists($tmp)) {
			return '/'.$tmp;
		}
		return false;
	}

	public function has_szinpad(){
		if(!$this->loaded()) return false;

		return $this->szinpad->count_all()>0;
	}

	public function get_videok(){
		if(!$this->loaded()) return false;

		return ORM::factory("ArchivumVideo")->where("archivum_ev_id", "=", $this->id)->find_all();
	}

/*
	public function rules(){
		return array(
			'id' => array(
				array('not_empty'),
				array('decimal'),
				array('exact_length', array(':value', 4))
			),
		);
	}
*/
	public function labels(){
		return array(
			"id" => "Évszám",
			"leiras" => "Leírás",
			"hash" => "Logo",
			"aktiv" => "látszik",
			"kiemelt_video_id" => "Kiemelt videó",
		);
	}
}
