<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Offprogram extends Controller_Admin_Template {

	protected static $tmp_mappa = "userfiles/tmp/nemzene/";
	protected static $mappa = "userfiles/nemzene/";

	public function action_index() {
		$lista = ORM::factory('Offprogram')->find_all();

		$this->template->title = "Nemzene";
		$this->template->tartalom = View::factory("admin/offprogram/lista")->bind('lista', $lista);
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$offprogram = ORM::factory('Offprogram', $id);
		$tipusok = array();
		$columns = $offprogram->list_columns();

		foreach($columns['tipus']['options'] as $t){
			$tipusok[$t] = $t;
		}

		if (!empty($_POST)) {

			if (!Arr::get($_POST, 'link')) {
				$_POST['link'] = URL::title(Arr::get($_POST, 'cim'), "-", true);
			}

			try {
				Database::instance()->begin();

				$_POST['aktiv'] = Arr::get($_POST, 'aktiv', 0);
				$datum_tol = Arr::get($_POST, 'datum_tol');
				$_POST['datum_tol'] = empty($datum_tol) ? null : $datum_tol;
				$datum_ig = Arr::get($_POST, 'datum_ig');
				$_POST['datum_ig'] = empty($datum_ig) ? null : $datum_ig;

				$offprogram->values($_POST);

				if(Arr::path($_FILES, "hash.error")==0 and Arr::path($_FILES, "hash.size")>0 ){
					$file = Arr::path($_FILES, "hash.name");

					preg_match('/\.(.*)$/', $file, $fileext);
					preg_match('/(.*)\.[^.]+$/', $file, $filename);

					$hash = sha1($filename[1].time().uniqid()).$fileext[0];

					$img = Image::factory(Arr::path($_FILES, "hash.tmp_name"));
					$img->resize(1200);
					//$img->resize(1200, 680, Image::INVERSE);
					//$img->crop(1200, 680);

					$regi_kep = self::$mappa.$offprogram->hash;

					if($img->save(self::$mappa.$hash)){
						$offprogram->hash = $hash;
						if(file_exists($regi_kep) and is_file($regi_kep)){
							unlink($regi_kep);
						}
					}
				}

				$offprogram->save();

				$offprogram->remove('jegy');

				$jegyek = Arr::get($_POST, 'jegyek');
				if(is_array($jegyek)) {
					$offprogram->add('jegy', $jegyek);
				}

				Session::instance()->set('uzenet', 'Program mentve');
				Database::instance()->commit();
				$this->redirect('/admin/offprogram/szerkeszt/' . $offprogram->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors('szoveg'));
				Database::instance()->rollback();
			}
		}
		$this->template->title = "Off program";
		$this->template->subtitle = ($offprogram->id == '') ? "új program hozzáadása" : ("<span class='nev'>\""
			. $offprogram->cim
			. "\"</span> szerkesztése");

		$jegyek = ORM::factory("Jegy")->find_all();

		$this->template->tartalom = View::factory('admin/offprogram/form')
			->set('tipusok', $tipusok)
			->set('szoveg', $offprogram)
			->set('jegyek', $jegyek->as_array('id','nev'));
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$szoveg = ORM::factory('Offprogram', $id);
		$szoveg->delete();
		Session::instance()->set('figyelmeztet', "Program törölve!");
		$this->redirect('/admin/offprogram');
	}


	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Offprogram',$a);
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
