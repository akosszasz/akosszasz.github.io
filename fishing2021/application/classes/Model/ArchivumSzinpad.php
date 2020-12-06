<?php defined('SYSPATH') or die('No direct script access.');

class Model_ArchivumSzinpad extends ORM {

	protected $_table_name = "archivum_szinpad";
	protected $_sorting = array('sorrend'=>'ASC');

	protected $_belongs_to = array(
		"ev"=>array(
			"model"=>"ArchivumEv",
			"foreign_key"=>"archivum_ev_id"
		),
	);

	protected $_has_many = array(
		"video"=>array(
			"model"=>"ArchivumVideo",
			"foreign_key"=>"archivum_szinpad_id",
		),
	);

	public function latszik() {
		return $this->where("aktiv","=","1");
	}

	public function labels(){
		return array(
			"archivum_ev_id" => "Év",
			"nev" => "Név",
			"aktiv" => "látszik",
		);
	}
}
