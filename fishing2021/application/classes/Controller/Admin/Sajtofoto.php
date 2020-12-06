<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Sajtofoto extends Controller_Admin_Template {

	public function action_index() {
		$galeria = ORM::factory('Sajtofoto')->find_all();

		if(Arr::get($_POST, "kep")) {
			try {
				foreach(Arr::get($_POST, "kep") as $kep_id => $post){
					$kep = ORM::factory('Sajtofoto', $kep_id);
					$kep->values($post);
					$kep->aktiv = Arr::get($post, 'aktiv', '0');
					$kep->save();
				}

				Session::instance()->set('uzenet','Sajtófotók mentve');
				$this->redirect("/admin/sajtofoto/");
			}
			catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('galeria'));
			}
		}

		$this->template->title = "Sajtófotók";
		$this->template->tartalom = View::factory('admin/sajtofoto/form')->bind('galeria',$galeria);
	}

	public function action_kepfeltoltes() {
		$this->auto_render = false;

		$feltolto = new Kepfeltoltes;
		$rules = $feltolto->get_rules();

		$rules['multiple'] = true;
		$rules['values'] = array("aktiv"=>1);
		$rules['thumb'] = true;
		$rules['thumbwidth'] = 300;
		$rules['thumbheight'] = 300;

		try {
			$feltolto->feltolt('Sajtofoto', 'userfiles/sajtofoto/', 'hash', '', $rules);
		}
		catch (KepException $e){
			$error['hiba'] = $e->get_message();
			echo json_encode($error);
		}
	}

	public function action_keptorol() {
		$id = $this->request->param('id');
		$kep = ORM::factory('Sajtofoto',$id);
		@unlink('userfiles/sajtofoto/'.$kep->hash);
		@unlink('userfiles/sajtofoto/th/'.$kep->hash);
		$kep->delete();
		Session::instance()->set('figyelmeztet',"Kép törölve!");
		$this->redirect('/admin/sajtofoto');
	}

	public function action_sorrend() {
		$this->auto_render = false;
		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('Sajtofoto',$a);
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