<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Tamogatas extends Controller_Template {

	public function action_index() {

		$this->template->aktiv_oldal = "tamogatas";
		$this->template->title = "Támogatás";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "tamogatas")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}
}