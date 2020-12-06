<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Slider extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/slider/";
	protected static $mappa = "userfiles/slider/";


	public function before() {
		parent::before();
		$this->template->title = "Slider";
	}

	public function action_index() {
		$model = ORM::factory("Slider");

		$v = View::factory("admin/slider/lista");
		$v->set("sliders",$model->find_all());

		$this->template->tartalom = $v;
	}

	public function action_hozzaad() {
		$this->template->title = "Új slider feltöltése";
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function save($id = null) {
		$model = ORM::factory("Slider",$id);

		$forditasok = array();
		foreach (Kohana::$config->load('nyelvek.nyelvek') as $k => $nyelv) {
			$forditas = ORM::factory('Sliderfordit');
			$forditas = $forditas->where('slider_id','=',$id)->where('lang','=',$k)->find();
			$forditasok[$k] = $forditas;
		}

		if ( ! empty($_POST)) {
			$model->values($_POST);

			try {

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					//$img->resize(640, 360, Image::INVERSE);
					//$img->crop(640, 360);

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

				/*
				foreach ($forditasok as $ny => $ford) {
					$ford->slider_id = $model->id;
					$ford->cim = $_POST['cim_'.$ny];
					$ford->alcim = $_POST['alcim_'.$ny];
					$ford->baszoka = $_POST['baszoka_'.$ny];
					$ford->lang = $ny;

					$ford->save();
				}
				*/

				Session::instance()->set('uzenet','Slider mentve');

				$this->redirect("/admin/slider/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				$errors = $e->errors("asdf");
			}
		}

		$v = View::factory("admin/slider/form");
		$v->model = $model;
		$v->bind("errors",$errors);
		$v->bind("forditasok",$forditasok);

		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("Slider",$this->request->param("id"));

		$regi_kep = self::$mappa.$model->hash;

		if ($model->loaded()) {
			$model->delete();
		}

		if(file_exists($regi_kep) and is_file($regi_kep)){
			unlink($regi_kep);
		}
		$this->redirect("/admin/slider");
	}


	public function action_sliderkepfeltoltes() {
		$this->auto_render = false;

		$id = $this->request->param('id');

		$feltolto = new Kepfeltoltes;
		$rules = $feltolto->get_rules();
		$rules['crop'] = true;
		$rules['ifbigger'] = true;
		$rules['width'] = 1920;

		try {
			$feltolto->feltolt(	'Slider',
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
			$im->resize(640,360);
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
			$elem = ORM::factory('Slider',$a);
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
} // End Controller_Admin_Slider
