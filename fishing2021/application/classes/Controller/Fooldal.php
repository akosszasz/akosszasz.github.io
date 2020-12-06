<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Fooldal extends Controller_Template {

	public function action_index() {
		//$this->action_tamogatas();
		$this->action_hamarosan();
		//$this->action_programfooldal();
		//$this->action_fooldal();
	}

	protected function action_fooldal() {
		$this->template->aktiv_oldal = "fooldal";
		$this->template->title = null;

		View::set_global('slider', ORM::factory("Slider")->latszik()->find_all());
		View::set_global('lista', ORM::factory("Fooldal")->where('headline', '!=', '')->latszik()->order_by(DB::expr("RAND()"))->limit(12)->find_all());

		$hirek = ORM::factory('Hir')->latszik()->limit(3)->find_all();
		$nemzene = ORM::factory('Offprogram')->latszik()->order_by(DB::expr("RAND()"))->limit(3)->find_all();

		$this->template->tartalom = View::factory('fooldal',array(
			'hirek' => $hirek,
			'nemzene' => $nemzene,
		));
	}

	public function action_tamogatas(){
		$this->redirect("tamogatas");
	}

	public function action_hamarosan(){
		$fellepok = false;
		$szoveg = ORM::factory("Szoveg")->where("link", "=", "2018-fellepok")->where("nyelv", "=", I18n::lang())->find();
		if($szoveg->loaded()) $fellepok = $szoveg->szoveg;

		$this->template = View::factory("template/hamarosan-2020", array(
			'fellepok' => $fellepok
		));
	}

	public function action_programfooldal(){
		$viziszinpad = ORM::factory("Szoveg")->where("link", "=", "2017-temp-viziszinpad")->find();
		$tuzhozkozel = ORM::factory("Szoveg")->where("link", "=", "2017-temp-tuzhozkozel")->find();

		$this->template = View::factory("template/programfooldal", array(
			'program' => ORM::factory("Szoveg")->where("link", "=", "2017-temp-programfooldal")->where("nyelv", "=", I18n::lang())->find(),
			'viziszinpad' => $viziszinpad,
			'tuzhozkozel' => $tuzhozkozel,
		));
	}
}
