<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Info extends Controller_Admin_Template {

	public function action_index() {
		$this->auto_render = false;
		//echo Auth::instance()->hash('PLdqM3Cu');
		//var_dump(Image::$default_driver);
		//phpinfo();
	}

} // End Admin_Info
