<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Sajtokozlemeny extends Controller_Admin_Template {

	public function action_index() {

		$szoveg = ORM::factory('Szoveg')->where('link', '=', 'sajtokozlemenyek')->find();

		if ( ! empty($_POST)) {
			try {
				$szoveg->values($_POST);
				$szoveg->save();

				Session::instance()->set('uzenet','Sikeresen mentette a dokumentumot!');

				$this->redirect("/admin/galeria/szerkeszt/".$szoveg->id);
			}
			catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('galeria'));
			}
		}

		$this->template->title = "Sajtóközlemények";

		$this->template->tartalom = View::factory('admin/sajtokozlemenyek/form')->bind('szoveg',$szoveg);
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$szoveg = ORM::factory('Galeria',$id);
		$kepek = $szoveg->kepek->find_all();
		foreach ($kepek as $kep) {
			@unlink('userfiles/sajtokozlemenyek/'.$id.'/'.$kep->hash);
		}
		$szoveg->delete();
		Session::instance()->set('figyelmeztet',"Galéria törölve!");
		$this->redirect('/admin/sajtokozlemenyek');
	}

	public function action_feltoltes() {
		$this->auto_render = false;

		require_once(APPPATH."/vendor/qqFileUploader.php");
		$uploader = new qqFileUploader(array('pdf','doc','docx','rtf','xls','xlsx'), 10*1024*1024);
		$result = $uploader->handleUpload('userfiles/sajto/', true, false);
		echo json_encode($result);
	}

	public function action_keptorol() {
		$id = $this->request->param('id');
		$kep = ORM::factory('Kep',$id);
		$szoveg = $kep->galeria->id;
		@unlink('userfiles/galeria/'.$szoveg.'/'.$kep->hash);
		$kep->delete();
		Session::instance()->set('figyelmeztet',"Kép törölve!");
		$this->redirect('/admin/sajtokozlemenyek/szerkeszt/'.$szoveg);
	}

	public function action_sorrend() {
		$this->auto_render = false;
		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Kep',$a);
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