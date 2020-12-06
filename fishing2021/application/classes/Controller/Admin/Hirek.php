<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Hirek extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/hirek/";
	protected static $mappa = "userfiles/hirek/";

	public function before() {
		parent::before();
		$this->template->title = "Hírek";
	}

	public function action_index() {
		$model = ORM::factory("Hir")->order_by('datum', 'desc');

		$v = View::factory("admin/hirek/lista");
		$v->set("hirek",$model->find_all());

		$this->template->tartalom = $v;
	}

	public function action_hozzaad() {
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function save($id = null) {
		$model = ORM::factory("Hir",$id);

		$forditasok = array();
		foreach (Kohana::$config->load('nyelvek.nyelvek') as $kod => $value) {
			$forditasok[$kod] = $model->forditva($kod);
		}

		if ( ! empty($_POST)) {
			$model->values($_POST);

			try {
				Database::instance()->begin();

				if(!$model->datum){
					$model->datum = date("Y-m-d");
				}

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					$img->resize(1200);
					//$img->crop(1200, 680);

					$regi_kep = self::$mappa.$model->hash;

					if($img->save(self::$mappa.$hash)){
						$model->hash = $hash;
						if(file_exists($regi_kep) and is_file($regi_kep)){
							unlink($regi_kep);
						}
					}
				}

				$model->save();

				foreach ($forditasok as $ny => $ford) {
					$ford->hir_id = $model->id;
					$ford->cim = $_POST['cim_'.$ny];
					$ford->lead = $_POST['lead_'.$ny];
					$ford->szoveg = $_POST['szoveg_'.$ny];
					$ford->lang = $ny;

					$ford->save();
				}
				
				Database::instance()->commit();
				Session::instance()->set('uzenet','Hír mentve');

				$this->redirect("/admin/hirek/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				Database::instance()->rollback();
				Session::instance()->set('errors',$e->errors('hir'));
			}
		}

		$v = View::factory("admin/hirek/form");

		$v->model = $model;
		$v->forditasok = $forditasok;
		$v->bind("errors",$errors);
		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("Hir",$this->request->param("id"));

		$regi_kep = self::$mappa.$model->hash;

		if ($model->loaded()) {
			$model->delete();
		}

		if(file_exists($regi_kep) and is_file($regi_kep)){
			unlink($regi_kep);
		}

		$this->redirect("/admin/hirek");
	}

}
