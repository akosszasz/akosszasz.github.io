<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Rockfaterkocka extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Rockfater kocka";
		$this->template->aktiv = "rockfaterkocka";
	}

	public function action_index() {
		$lista = ORM::Factory('Rockfaterkocka')->find_all();

		$this->template->tartalom = View::factory("admin/rockfaterkocka/lista", array(
			'lista'=>$lista,
		));
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$model = ORM::Factory('Rockfaterkocka',$id);

		if ( ! empty($_POST)) {
			try {

				$model->values($_POST);
				$model->latszik = Arr::get($_POST,'latszik',0);
				$model->save();

				Session::instance()->set('uzenet','Szöveg mentve');
				$this->redirect('/admin/rockfaterkocka/szerkeszt/'.$model->id);
			}
			catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('rockfaterkocka'));
			}
		}

		$this->template->tartalom = View::factory('admin/rockfaterkocka/form', array(
			'model'=>$model,
		));
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$video = ORM::Factory('Rockfaterkocka',$id);
		$video->delete();
		Session::instance()->set('figyelmeztet',"Szöveg törölve!");
		$this->redirect('/admin/rockfaterkocka');
	}

}