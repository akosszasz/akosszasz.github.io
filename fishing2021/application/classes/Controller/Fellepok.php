<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Fellepok extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "fellepok";
		$this->template->aloldal_fejlec_title = "Fellépők";

		$aloldal_menu = View::factory("elemek/aloldal-menu",
			array(
				"aloldal_menu" => array(
					"fellepok" => "Összes",
					"fellepok/napibontas" => "Napi bontás"
				),
				"aktiv_almenu" => Request::$current->uri()
			)
		);

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {
		$this->redirect("fooldal");

		$this->template->title = "Összes fellépő";
		$this->template->aloldal_fejlec_title = "Program";

		$this->template->tartalom = View::factory("fellepok/osszes");
	}

	public function action_napibontas() {
		$this->redirect("fooldal");
		$this->template->title = "Napi bontás";
		$this->template->aloldal_fejlec_title = "Program";

		$fellepok = ORM::factory("Szoveg")->where("link", "=", "2018-fellepok")->where("nyelv", "=", I18n::lang())->find();

		$this->template->tartalom = View::factory("fellepok/napibontas",array(
			'fellepok' => $fellepok,
		));
	}

	public function action_off() {
		$this->redirect("fooldal");
		$this->template->title = "Off programok";
		$this->template->aloldal_fejlec_title = "Program";

		$programok = ORM::factory("Offprogram")->aktiv()->find_all();
		$jegytipus = ORM::factory("Jegytipus", 3);
		$szoveg = ORM::factory("Szoveg")->where("link", "=", "programok-off")->find();

		$this->template->tartalom = View::factory("program/off",array(
			'szoveg' => $szoveg,
			'programok' => $programok,
			'jegyek' => $jegytipus->jegy->latszik()->find_all(),
		));
	}

	public function action_kulso() {
		$this->redirect("fooldal");
		$this->template->title = "Külső programok";
		$this->template->aloldal_fejlec_title = "Program";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "programok-kulso")->find();
		$jegytipus = ORM::factory("Jegytipus", 2);
		$programok = ORM::factory("Kulsoprogram")->aktiv()->find_all();

		$this->template->tartalom = View::factory("program/kulso",array(
			'szoveg' => $szoveg,
			'programok' => $programok,
			'jegyek' => $jegytipus->jegy->latszik()->find_all(),
		));
	}

	public function action_mozi() {
		$this->redirect("fooldal");
		$this->template->title = "Mozi";
		$this->template->aloldal_fejlec_title = "Program";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "programok-mozi")->find();

		$this->template->tartalom = View::factory("program/mozi",array(
			'szoveg' => $szoveg,
			'jegyek' => false,
		));
	}

}