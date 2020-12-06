<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Szoveg extends Controller_Admin_Template {

	public function action_index() {
		$lista = ORM::factory('Szoveg')->order_by('cim')->find_all();

		$nyelvek = array();
		foreach(Kohana::$config->load('nyelvek.nyelvek') as $nyelvkod=>$nev){
			$nyelvek[$nyelvkod] = $nyelvkod;
		}

		$this->template->title = "Szövegek";
		$this->template->tartalom = View::factory("admin/szoveg/lista")->bind('lista', $lista)
																	   //->bind('nyelv_szures', $nyelv_szures)
																	   ->bind('nyelvek', $nyelvek);
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$szoveg = ORM::factory('Szoveg', $id);
		if (!empty($_POST)) {

			if (!Arr::get($_POST, 'link') and !$szoveg->fix_link) {
				$_POST['link'] = URL::title(Arr::get($_POST, 'cim'), "-", true);
			}

			try {
				Database::instance()->begin();

				$szoveg->values($_POST);
				$szoveg->save();
				
				Session::instance()->set('uzenet', 'Szöveg mentve');
				Database::instance()->commit();
				$this->redirect('/admin/szoveg/szerkeszt/' . $szoveg->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors('szoveg'));
				Database::instance()->rollback();
			}
		}
		$this->template->title = "Szöveg";
		$this->template->subtitle = ($szoveg->id == '') ? "új elem hozzáadása" : ("<span class='nev'>\""
			. $szoveg->cim
			. "\"</span> szerkesztése");

		$this->template->tartalom = View::factory('admin/szoveg/form')
			->bind('szoveg', $szoveg);
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$szoveg = ORM::factory('Szoveg', $id);
		$szoveg->delete();
		Session::instance()->set('figyelmeztet', "Szöveg törölve!");
		$this->redirect('/admin/szoveg');
	}

}
