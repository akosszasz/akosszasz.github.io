<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Jegytipus extends Controller_Admin_Template {

	public function action_index() {
		$lista = ORM::factory('Jegytipus')->find_all();

		$this->template->title = "Jegytípusok";
		$this->template->tartalom = View::factory("admin/jegytipus/lista")->bind('lista', $lista)
																	   //->bind('nyelv_szures', $nyelv_szures)
																	   ->bind('nyelvek', $nyelvek);
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$model = ORM::factory('Jegytipus', $id);
		if (!empty($_POST)) {

			try {
				$model->values($_POST);
				$model->aktiv = Arr::get($_POST, 'aktiv', '0');
				$model->save();
				
				Session::instance()->set('uzenet', 'Jegytípus mentve');
				$this->redirect('/admin/jegytipus/szerkeszt/' . $model->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors('jegytipus'));
			}
		}
		$this->template->title = "Jegytípus";
		$this->template->subtitle = ($model->id == '') ? "új elem hozzáadása" : ("<span class='nev'>\""
			. $model->nev
			. "\"</span> szerkesztése");

		$this->template->tartalom = View::factory('admin/jegytipus/form')
			->bind('model', $model);
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$model = ORM::factory('Jegytipus', $id);
		$model->delete();
		Session::instance()->set('figyelmeztet', "Jegytípus törölve!");
		$this->redirect('/admin/jegytipus');
	}

}
