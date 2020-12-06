<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Sajto extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "sajto";
		$this->template->aloldal_fejlec_title = "Sajtó";

		$aloldal_menu = View::factory("elemek/aloldal-menu",
			array(
				"aloldal_menu" => array(
					"sajto/sajtokozlemenyek" => "Sajtóközlemények",
					"sajto/sajtofotok" => "Sajtófotók",
					"sajto/sajtoakkreditacio" => "Sajtóakkreditáció",
				),
				"aktiv_almenu" => Request::$current->uri()
			)
		);

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {

		$this->template->title = "Sajtó";

		if (time()<mktime(0,0,0,6,7,2020) and $this->request->method() == Request::POST) {
			$model = ORM::factory("Sajtoakkreditacio");
			$model->values($_POST);
			$model->datum = date('Y-m-d H:i:s');
			$model->fesztivalnapok = json_encode(Arr::get($_POST, 'fesztivalnapok', array()));

			try {
				$model->save();
				Session::instance()->set('uzenet', __("Sajtóakkreditáció mentve"));
				$this->redirect($this->request->referrer());
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors', $e->errors("sajto"));
			} catch (ErrorException $e){
				Session::instance()->set('errors', $e->getMessage());
			}
		}

		$sajtokozlemenyek = ORM::factory("Szoveg")->where("link", "=", "sajtokozlemenyek")->find();
		$sajtoakkreditacio = ORM::factory("Szoveg")->where("link", "=", "sajtoakkreditacio")->find();
		$kepek = ORM::factory("Sajtofoto")->latszik()->find_all();

		$this->template->tartalom = View::factory("sajto",array(
			"sajtokozlemenyek" => $sajtokozlemenyek,
			"sajtoakkreditacio" => $sajtoakkreditacio,
			'kepek' => $kepek,
			"model" => new Model_Sajtoakkreditacio(),
		));
	}

	public function action_sajtokozlemenyek() {

		$this->template->title = "Sajtóközlemények";

		$szoveg = ORM::factory("Szoveg")->where("link", "=", "sajtokozlemenyek")->find();

		$this->template->tartalom = View::factory("sajto/sajtokozlemenyek",array(
			"szoveg" => $szoveg,
		));
	}

	public function action_sajtofotok() {

		$this->template->title = "Sajtófotók";

		$kepek = ORM::factory("Sajtofoto")->latszik()->find_all();

		$this->template->tartalom = View::factory("sajto/sajtofotok",array(
			'kepek' => $kepek
		));
	}

	public function action_sajtoakkreditacio() {
		$this->template->title = "Sajtóakkreditáció";

		$this->template->tartalom = View::factory("sajto/sajtoakkreditacio");
	}

}