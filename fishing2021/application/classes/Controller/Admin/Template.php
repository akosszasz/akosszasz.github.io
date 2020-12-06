<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Template extends Kohana_Controller_Template {
	public $template = "template/admin";

	public function before() {
		parent::before();

		$auth = Auth::instance();
		$role = ORM::Factory('Role', array('name' => 'admin'));
		if ( ! $auth->get_user()) {
			if ($auth->auto_login() && $auth->get_user()->has('roles', $role)){
				$this->template->logininfo = $auth->get_user()->username;
			}else{
				Cookie::set("redirect_to",$this->request->uri());
				$this->redirect("/admin/admin/belepes");
			}
		}else{
			if ( ! $auth->get_user()->has('roles', $role)){
				Cookie::set("redirect_to",$this->request->uri());
				$this->redirect("/admin/admin/belepes");
			}
		}
		
		$this->template->admin_logged_in =
			Auth::instance()->get_user() &&
			Auth::instance()->get_user()->has("roles",$role);

		$this->template->title = 'Admin';

		I18n::lang("hu");
		View::set_global("ny", I18n::lang());
	}


} // End Admin_Template
