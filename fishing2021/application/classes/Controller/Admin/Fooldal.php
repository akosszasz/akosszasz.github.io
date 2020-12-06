<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Fooldal extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Főoldal szövege";
	}

	public function action_index() {
		$post = Arr::get($_POST, "model");
		if ($post) {
			try {
				foreach($post as $id=>$m){
					$model = ORM::factory("Fooldal", $id);

					if(!$model->loaded()) continue;

					$model->values($m);
					$model->aktiv = Arr::get($m, 'aktiv', '0');
					$model->save();
				}

				Session::instance()->set('uzenet','Főoldal mentve');
				$this->redirect($this->request->referrer());
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors("fooldal"));
			}
		}

		$lista = ORM::factory("Fooldal")->find_all();
		$this->template->tartalom = View::factory("admin/fooldal/lista", array('lista' => $lista));
	}
}
