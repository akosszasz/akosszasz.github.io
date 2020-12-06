<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Archivum_Ev extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/archivum_ev/";
	protected static $mappa = "userfiles/archivum_ev/";

	public function before() {
		parent::before();
		$this->template->title = "Archívum - Év";
	}

	public function action_index() {
		$model = ORM::factory("ArchivumEv");

		$v = View::factory("admin/archivum/ev/lista");
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
		$model = ORM::factory("ArchivumEv",$id);

		if ( ! empty($_POST)) {
			$model->values($_POST);
			$model->id = Arr::get($_POST, "id");
			$model->aktiv = Arr::get($_POST, 'aktiv', '0');

			try {
				Database::instance()->begin();

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					//$img->resize(1200);
					//$img->resize(640, 360, Image::INVERSE);
					//$img->crop(640, 360);

					$regi_kep = self::$mappa.$model->hash;

					if(!is_dir(self::$mappa)) {
						mkdir(self::$mappa, 0777);
					}

					if($img->save(self::$mappa.$hash)){
						$model->hash = $hash;
						if(file_exists($regi_kep) and is_file($regi_kep)){
							unlink($regi_kep);
						}
					}
				}

				$model->save();

				Database::instance()->commit();
				Session::instance()->set('uzenet','Év mentve');

				$this->redirect("/admin/archivum/ev/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				Database::instance()->rollback();
				Session::instance()->set('errors',$e->errors('hir'));
			}
		}

		if($model->loaded()){
			$videok = $model->get_videok()->as_array("id", "youtube_title");
			$videok = array(""=>"(válassz videót - ha nincs kiválasztva, akkor a legelső lesz a kiemelt)") + $videok;
		} else {
			$videok = array(""=>"(először mentsd el az évet, utána lehet videót választani)");
		}

		$v = View::factory("admin/archivum/ev/form");

		$v->model = $model;
		$v->bind("errors",$errors);
		$v->bind("videok",$videok);
		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("ArchivumEv",$this->request->param("id"));

		$regi_kep = self::$mappa.$model->hash;

		if ($model->loaded()) {
			$model->delete();
		}

		if(file_exists($regi_kep) and is_file($regi_kep)){
			unlink($regi_kep);
		}

		$this->redirect("/admin/archivum/ev");
	}

}
