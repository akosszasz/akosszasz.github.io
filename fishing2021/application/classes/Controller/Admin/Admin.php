<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Admin extends Controller_Template{
	public $template = "template/admin";

	public function action_belepes() {

		//echo Auth::instance()->hash_password('CVpNe88h');

		$this->template->uzenet = View::factory('admin/uzenet');
		$this->template->tartalom = View::factory("admin/admin/login");
		$this->template->title = null;
		$this->template->aktiv_oldal = 'belepes';

		if ( ! empty($_POST['username']) && ! empty($_POST['password'])) {
			$auth = Auth::instance();
			if ($auth->login($_POST['username'], $_POST['password']) &&
				$auth->get_user()->has("roles",ORM::Factory('Role',array("name"=>"admin")))){
				if (Cookie::get("redirect_to")=="/admin/admin/belepes"
						||Cookie::get("redirect_to")=="admin"
						||mb_strpos(Cookie::get("redirect_to"),"admin")===false){
					$this->redirect("/admin/");
				}else {
					$this->redirect(Cookie::get("redirect_to"));
				}
			}else{
				$auth->logout();
				Session::instance()->set('errors','Hibás felhasználónév vagy jelszó!');
			}
		}
	}

	public function action_kilepes() {
		$auth = Auth::instance();
		$auth->logout();
		$this->redirect("/admin/admin/belepes");
	}

}
