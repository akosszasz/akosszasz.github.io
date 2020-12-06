<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Tamogato extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/tamogato/";
	protected static $mappa = "userfiles/tamogato/";


	public function before() {
		parent::before();
		$this->template->title = "Támogatók";
	}

	public function action_index() {
		$model = ORM::factory("Tamogato");

		$v = View::factory("admin/tamogato/lista");
		$v->set("tamogatok",$model->find_all());

		$this->template->tartalom = $v;
	}

	public function action_hozzaad() {
		$this->template->title = "Új támogató feltöltése";
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function save($id = null) {
		$model = ORM::factory("Tamogato",$id);

		if ( ! empty($_POST)) {
			$model->values($_POST);

			try {

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					$img->resize(166, 166, Image::INVERSE);
					$img->crop(166, 166);

					if(!is_dir(self::$mappa)){
						mkdir(self::$mappa, 0777);
					}

					$regi_kep = self::$mappa.$model->hash;

					if($img->save(self::$mappa.$hash)){
						$model->hash = $hash;
						if(file_exists($regi_kep) and is_file($regi_kep)){
							unlink($regi_kep);
						}
					}
				}


				$model->latszik = Arr::get($_POST,'latszik',0);
				$model->save();
				$this->do_crop($model);

				Session::instance()->set('uzenet','Támogató mentve');

				$this->redirect("/admin/tamogato/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				$errors = $e->errors("asdf");
			}
		}

		$v = View::factory("admin/tamogato/form");
		$v->model = $model;
		$v->bind("errors",$errors);

		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("Tamogato",$this->request->param("id"));

		$regi_kep = self::$mappa.$model->hash;

		if ($model->loaded()) {
			$model->delete();
		}

		if(file_exists($regi_kep) and is_file($regi_kep)){
			unlink($regi_kep);
		}
		Session::instance()->set('uzenet','Támogató törölve');
		$this->redirect("/admin/tamogato");
	}


	public function action_tamogatokepfeltoltes() {
		$this->auto_render = false;

		$id = $this->request->param('id');

		$feltolto = new Kepfeltoltes;
		$rules = $feltolto->get_rules();
		$rules['crop'] = true;
		$rules['ifbigger'] = true;
		$rules['width'] = 170;

		try {
			$feltolto->feltolt(	'Tamogato',
								self::$tmp_mappa,
								'hash',
								$id,
								$rules);
		}
		catch (KepException $e){
			$error['hiba'] = $e->get_message();
			echo json_encode($error);
		}
	}

	public function do_crop($m) {
		$d = Arr::get($_POST,'kep_c');
		if (isset($d['w']) && $d['w']>0 && isset($d['h']) && $d['h']>0 && file_exists((self::$tmp_mappa.$m->hash))) {

			if ( ! is_dir(self::$mappa.$m->id)) {
				mkdir(self::$mappa.$m->id,0777,true);
			}

			$im = Image::factory(self::$tmp_mappa.$m->hash);
			$im->crop($d['w'],$d['h'],$d['x'],$d['y']);
			$im->resize(170,170);
			$im->save(self::$mappa.$m->id.'/'.$m->hash);

			@unlink(self::$tmp_mappa.$m->hash);
		}
	}

	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Tamogato',$a);
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
} // End Controller_Admin_Tamogato
