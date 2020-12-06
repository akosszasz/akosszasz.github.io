<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Kulsoprogram extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/kulsoprogram/";
	protected static $mappa = "userfiles/kulsoprogram/";

	public function action_index() {
		$lista = ORM::factory('Kulsoprogram')->find_all();

		$this->template->title = "Külső programok";
		$this->template->tartalom = View::factory("admin/kulsoprogram/lista")->bind('lista', $lista);
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$kulsoprogram = ORM::factory('Kulsoprogram', $id);
		if (!empty($_POST)) {

			if (!Arr::get($_POST, 'link')) {
				$_POST['link'] = URL::title(Arr::get($_POST, 'cim'), "-", true);
			}

			try {
				Database::instance()->begin();

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					$img->resize(1200);
					//$img->resize(640, 360, Image::INVERSE);
					//$img->crop(640, 360);

					if(!is_dir(self::$tmp_mappa)) mkdir(self::$tmp_mappa, 0777);
					if(!is_dir(self::$mappa)) mkdir(self::$mappa, 0777);

					$regi_kep = self::$mappa.$kulsoprogram->hash;

					if($img->save(self::$mappa.$hash)){
						$kulsoprogram->hash = $hash;
						if(file_exists($regi_kep) and is_file($regi_kep)){
							unlink($regi_kep);
						}
					}
				}

				$_POST['aktiv'] = Arr::get($_POST, 'aktiv', 0);
				$kulsoprogram->values($_POST);
				$kulsoprogram->save();

				$kulsoprogram->remove('jegy');

				$jegyek = Arr::get($_POST, 'jegyek');
				if(is_array($jegyek)) {
					$kulsoprogram->add('jegy', $jegyek);
				}

				Session::instance()->set('uzenet', 'Program mentve');
				Database::instance()->commit();
				$this->redirect('/admin/kulsoprogram/szerkeszt/' . $kulsoprogram->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors('szoveg'));
				Database::instance()->rollback();
			}
		}
		$this->template->title = "Külső program";
		$this->template->subtitle = ($kulsoprogram->id == '') ? "új program hozzáadása" : ("<span class='nev'>\""
			. $kulsoprogram->cim
			. "\"</span> szerkesztése");

		$jegyek = ORM::factory("Jegytipus", 2)->jegy->find_all();

		$this->template->tartalom = View::factory('admin/kulsoprogram/form')
			->set('szoveg', $kulsoprogram)
			->set('jegyek', $jegyek->as_array('id','nev'));
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$model = ORM::factory('Kulsoprogram', $id);

		$regi_kep = self::$mappa.$model->hash;

		if ($model->loaded()) {
			$model->delete();
		}

		if(file_exists($regi_kep) and is_file($regi_kep)){
			unlink($regi_kep);
		}

		Session::instance()->set('figyelmeztet', "Program törölve!");
		$this->redirect('/admin/kulsoprogram');
	}


	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Kulsoprogram',$a);
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
