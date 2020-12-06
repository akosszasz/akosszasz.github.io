<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Programkocka extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Program kocka szövege";
	}

	public function action_index() {
		$model = ORM::factory("Programkocka")->find();

		if ( ! empty($_POST)) {
			$model->values($_POST);

			try {
				$model->headline1 = Arr::get($_POST,'headline1');
				$model->headline2 = Arr::get($_POST,'headline2');
				$model->save();

				Session::instance()->set('uzenet','Szöveg mentve');

				$this->redirect($this->request->referrer());
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors("programkocka"));
			}
		}

		$this->template->tartalom = View::factory("admin/programkocka/form", array('model' => $model));
	}

}
