<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Kepfeltoltes extends Controller_Admin_Template {

	public function action_index() {
		$kepek = glob('userfiles/*.{'.implode(',', Kohana::$config->load('kepfeltoltes.kiterjesztesek')).'}', GLOB_BRACE);

		$this->template->title = "Képfeltöltés";
		$this->template->tartalom = View::factory('admin/kepfeltoltes/form', array('kepek' => $kepek));
	}

	public function action_kepfeltoltes() {
		$this->auto_render = false;

		require_once(APPPATH."/vendor/qqFileUploader.php");

		$allowed_extensions = Kohana::$config->load('kepfeltoltes.kiterjesztesek');
		$size_limit = Kohana::$config->load('kepfeltoltes.meret_korlat');

		$uploader = new qqFileUploader($allowed_extensions, $size_limit);
		$result = $uploader->handleUpload('userfiles/', true, false);
		echo json_encode($result);
	}

}