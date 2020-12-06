<?php defined('SYSPATH') or die('No direct script access.');

class Model_ArchivumVideo extends ORM {

	protected $_table_name = "archivum_video";
	protected $_sorting = array('archivum_ev_id'=>'ASC', 'sorrend'=>'ASC');

	protected $_belongs_to = array(
		"szinpad"=>array(
			"model"=>"ArchivumSzinpad",
			"foreign_key"=>"archivum_szinpad_id"
		),
		"ev"=>array(
			"model"=>"ArchivumEv",
			"foreign_key"=>"archivum_ev_id",
		),
	);

	public function has_szinpad() {
		return $this->archivum_szinpad_id>0;
	}

	public function latszik() {
		return $this->where("aktiv","=","1");
	}

	public function rules(){
		return array(
			'archivum_ev_id' => array(
				array('not_empty'),
				array('digit'),
			),
			'archivum_szinpad_id' => array(
				array('digit'),
			),
		);
	}

	public function labels(){
		return array(
			"archivum_ev_id" => "Év",
			"archivum_szinpad_id" => "Színpad",
			"youtube_id" => "Youtube ID",
			"youtube_title" => "Youtube cím",
			"aktiv" => "látszik",
		);
	}

	public function get_link(){
		if(!$this->loaded()) return false;

		return "https://www.youtube.com/watch?v=".$this->youtube_id;
	}
}
