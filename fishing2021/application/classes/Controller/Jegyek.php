<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Jegyek extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "jegyek";
		$this->template->title = "Jegyek";

		$jegytipusok = ORM::factory("Jegytipus")->order_by(DB::Expr('FIELD(`id`, 1,4,2,3)'))->latszik()->find_all();

		$aloldal_menu = array();
		foreach($jegytipusok as $jegytipus){
			$aloldal_menu[$jegytipus->get_link()] = $jegytipus->nev;
		}

		$this->default_tipus = $jegytipusok[0];

		$aloldal_menu = View::factory("elemek/aloldal-menu", array(
			"aloldal_menu" => $aloldal_menu,
			"aktiv_almenu" => Request::$current->uri()
		));

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {
		$this->redirect("fooldal");

		$tipus_link = $this->request->param("jegytipus");

		if(!$tipus_link) $this->redirect($this->default_tipus->get_link());

		$jegytipus = ORM::factory("Jegytipus")->where("link", "=", $tipus_link)->find();

		$this->template->title = "Jegyek - ".$jegytipus->nev;
		$this->template->tartalom = View::factory("jegy/jegytipus", array(
			"jegytipus" => $jegytipus,
			"jegyek" => $jegytipus->jegy->latszik()->order_by('jegy_altipus_id')->order_by('sorrend')->find_all(),
		));

	}

}