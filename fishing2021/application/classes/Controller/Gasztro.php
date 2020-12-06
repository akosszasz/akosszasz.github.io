<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Gasztro extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "gasztro";
		$this->template->aloldal_fejlec_title = "Gasztro";

		$aloldal_menu = View::factory("elemek/aloldal-menu",
			array(
				"aloldal_menu" => array(
					"gasztro/etel" => "Étel",
					"gasztro/ital" => "Ital",
				),
				"aktiv_almenu" => Request::$current->uri()
			)
		);

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {
		$this->redirect("fooldal");
		//$this->redirect("gasztro/etel");
	}

	public function action_etel() {
		$this->redirect("fooldal");
		$this->template->title = "Étel";
		$this->template->aloldal_fejlec_title = "Gasztro";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "gasztro-etel")->find();

		$this->template->tartalom = View::factory("gasztro/gasztro",array(
			'szoveg' => $szoveg,
		));
	}

	public function action_ital() {
		$this->redirect("fooldal");

		$this->template->title = "Ital";
		$this->template->aloldal_fejlec_title = "Gasztro";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "gasztro-ital")->find();

		$this->template->tartalom = View::factory("gasztro/gasztro",array(
			'szoveg' => $szoveg,
		));
	}

}