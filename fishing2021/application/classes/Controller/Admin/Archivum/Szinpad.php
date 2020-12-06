<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Archivum_Szinpad extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/archivum_szinpad/";
	protected static $mappa = "userfiles/archivum_szinpad/";

	public function before() {
		parent::before();
		$this->template->title = "Archívum - Színpad";
	}

	public function action_index() {
		$model = ORM::factory("ArchivumSzinpad");

		$v = View::factory("admin/archivum/szinpad/lista");
		$v->set("lista",$model->find_all());

		$this->template->tartalom = $v;
	}

	public function action_hozzaad() {
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function save($id = null) {
		$model = ORM::factory("ArchivumSzinpad",$id);

		if ( ! empty($_POST)) {
			$model->values($_POST);
			$model->aktiv = Arr::get($_POST, 'aktiv', '0');

			try {
				Database::instance()->begin();

				$model->save();

				Database::instance()->commit();
				Session::instance()->set('uzenet','Színpad mentve');

				$this->redirect("/admin/archivum/szinpad/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				Database::instance()->rollback();
				Session::instance()->set('errors',$e->errors('hir'));
			}
		}

		$v = View::factory("admin/archivum/szinpad/form");

		$v->model = $model;
		$v->bind("errors",$errors);
		$v->evek = ORM::factory("ArchivumEv")->find_all()->as_array("id","id");
		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("ArchivumSzinpad",$this->request->param("id"));

		if ($model->loaded()) {
			$model->delete();
		}

		$this->redirect("/admin/archivum/szinpad");
	}

	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('ArchivumSzinpad',$a);
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

	public function action_getszinpadok(){
		$this->auto_render = false;

		$ev = ORM::factory("ArchivumEv", (int)Arr::get($_POST, "ev"));

		if(!$ev->loaded()){
			echo "model not loaded";
		} else {
			$res = $ev->szinpad->find_all()->as_array("id","nev");

			if(empty($res)){
				$res = array(0=>"(nincs)");
			} else {
				$res = array("" => "(válassz)") + $res;
			}

			echo Form::select("archivum_szinpad_id", $res, null, array('id' => "archivum_szinpad_id", 'class' => 'form-control'));
		}
	}
}
