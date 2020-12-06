<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Szulinap extends Controller_Template {

	public function action_index() {
		$this->template->aktiv_oldal = "szulinap";
		$this->template->title = "Szülinap";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "szulinap")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}
}