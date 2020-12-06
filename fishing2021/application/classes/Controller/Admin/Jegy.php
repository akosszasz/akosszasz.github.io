<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Jegy extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Jegy";
	}

	public function action_index() {

		$this->template->tartalom = View::factory("admin/jegy/lista", array(
			'lista' => ORM::factory("Jegy")->find_all(),
		));
	}

	public function action_hozzaad() {
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function save($id = null) {
		$model = ORM::factory("Jegy",$id);

		if ( ! empty($_POST)) {
			$model->values($_POST);

			try {
				$model->values($_POST);
				$model->elfogyott = Arr::get($_POST, 'elfogyott', '0');
				$model->aktiv = Arr::get($_POST, 'aktiv', '0');
				$model->save();

				Session::instance()->set('uzenet','Jegy mentve');

				$this->redirect("/admin/jegy/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('hir'));
			}
		}

		$this->template->tartalom = View::factory("admin/jegy/form", array(
			'model' => $model,
			'tipusok' => array('' => '(válassz)') + ORM::factory("Jegytipus")->find_all()->as_array("id", "nev"),
		));
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("Jegy",$this->request->param("id"));

		if ($model->loaded()) {
			$model->delete();
		}

		$this->redirect("/admin/jegy");
	}

	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Jegy',$a);
			$elem->sorrend = $i;
			try{
				$elem->save();
			}
			catch(Exception $e){
				echo 'Hiba: '.$e;
			}
			$i++;
		}
	}
}
