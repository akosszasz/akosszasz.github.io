<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Info extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "info";
		$this->template->aloldal_fejlec_title = "Info";

		$aloldal_menu = View::factory("elemek/aloldal-menu",
			array(
				"aloldal_menu" => array(
					/*"info/hazirend" => "Házirend",
					"info/utazas" => "Utazás",
					"info/szallas" => "Szállás",
					"info/terkep" => "Térkép",*/
					"info/adatvedelem" => "Adatvédelem és adatkezelés",
					"info/aszf" => "ÁSZF"
				),
				"aktiv_almenu" => Request::$current->uri()
			)
		);

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {
		$this->redirect("info/hazirend");
	}

	public function action_hazirend() {
		$this->template->title = "Házirend";
		$this->template->aloldal_fejlec_title = "Info";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "info-hazirend")->find();

		$this->template->tartalom = View::factory("info/info",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_utazas() {
		$this->template->title = "Utazás";
		$this->template->aloldal_fejlec_title = "Info";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "info-utazas")->find();

		$this->template->tartalom = View::factory("info/info",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_szallas() {
		$this->template->title = "Szállás";
		$this->template->aloldal_fejlec_title = "Info";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "info-szallas")->find();

		$this->template->tartalom = View::factory("info/info",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_terkep() {
		$this->template->title = "Térkép";
		$this->template->aloldal_fejlec_title = "Info";

		$this->template->tartalom = View::factory("info/terkep");
	}


	public function action_adatvedelem() {
		$szoveg = ORM::factory("Szoveg")->where("link", "=", "adatvedelem-es-adatkezeles")->find();

		$this->template->title = "Adatvédelem és adatkezelés";
		$this->template->aloldal_fejlec_title = "Info";

		$this->template->tartalom = View::factory("info/adatvedelem",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_aszf() {
		$szoveg = ORM::factory("Szoveg")->where("link", "=", "altalanos-szerzodesi-feltetelek")->find();

		$this->template->title = "Általános Szerződési Feltételek";
		$this->template->aloldal_fejlec_title = "Info";

		$this->template->tartalom = View::factory("info/aszf",array(
			'szoveg' => $szoveg,
		));
	}

}