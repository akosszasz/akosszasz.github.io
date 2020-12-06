<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Kontakt extends Controller_Template {

	public function action_index() {

		$this->template->aktiv_oldal = "kontakt";
		$this->template->title = "Kontakt";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "kontakt")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_fooklub() {
		$this->template->aktiv_oldal = "fooklub";
		$this->template->title = "FOO Klub";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "foo-klub")->find();

		$this->template->tartalom = View::factory("foo-klub",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_tamogatas() {
		$this->template->aktiv_oldal = "tamogatas";
		$this->template->title = "Támogatás";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "tamogatas")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_kozlemeny() {
		$this->template->aktiv_oldal = "kozlemeny";
		$this->template->title = "Közlemény";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "kozlemeny")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_dicsosegfal() {
		$this->template->aktiv_oldal = "dicsosegfal";
		$this->template->title = "Dicsőségfal";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "dicsosegfal")->find();

		$this->template->tartalom = View::factory("szoveg/szoveg",array(
			'szoveg' => $szoveg,
		));
	}
}