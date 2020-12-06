<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Video extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Videók";
		$this->template->aktiv = "video";
	}

	public function action_index() {
		$lista = ORM::Factory('Video')->find_all();

		$this->template->tartalom = View::factory("admin/video/lista", array(
			'lista'=>$lista,
		));
	}

	public function action_szerkeszt() {
		$id = $this->request->param('id');
		$video = ORM::Factory('Video',$id);

		if ( ! empty($_POST)) {
			try {
				$_POST['youtube_id'] = Youtube::get_id($_POST['youtube_id']);
				$video->values($_POST);
				if(!$video->loaded() and !Arr::get($_POST, "datum")){
					$video->datum = date("Y-m-d");
				}
				$video->save();
				Session::instance()->set('uzenet','Videó mentve');
				$this->redirect('/admin/video/szerkeszt/'.$video->id);
			}
			catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('video'));
			}
		}

		$this->template->tartalom = View::factory('admin/video/form', array(
			'video'=>$video,
		));
	}

	public function action_torol() {
		$id = $this->request->param('id');
		$video = ORM::Factory('Video',$id);
		$video->delete();
		Session::instance()->set('figyelmeztet',"Videó törölve!");
		$this->redirect('/admin/video');
	}

}