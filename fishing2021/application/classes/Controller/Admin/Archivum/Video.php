<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Archivum_Video extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Archívum - Video";
	}

	public function action_index() {
		$model = ORM::factory("ArchivumVideo");

		if(Arr::get($_POST, "szures")){
			Session::instance()->set("szuro_video_ev", Arr::get($_POST, "szuro_video_ev"));
			Session::instance()->set("szuro_video_szinpad", Arr::get($_POST, "szuro_video_szinpad"));
		}

		if(Arr::get($_POST, "szures_torles")){
			Session::instance()->delete("szuro_video_ev");
			Session::instance()->delete("szuro_video_szinpad");
		}

		if(Session::instance()->get("szuro_video_ev")){
			$model = $model->where("archivum_ev_id", "=", Session::instance()->get("szuro_video_ev"));
		}

		if(Session::instance()->get("szuro_video_szinpad", "")!=""){
			$model = $model->where("archivum_szinpad_id", "=", Session::instance()->get("szuro_video_szinpad"));
		}

		$v = View::factory("admin/archivum/video/lista");
		$v->set("lista",$model->find_all());
		$v->evek = array("" => "(mindegyik)") + ORM::factory("ArchivumEv")->find_all()->as_array("id","id");
		$v->szinpadok = array("" => "(mindegyik)", 0 => "(nincs színpad)") + ORM::factory("ArchivumSzinpad")->find_all()->as_array("id","nev");

		$this->template->tartalom = $v;
	}

	public function action_hozzaad() {
		$this->save();
	}

	public function action_szerkeszt() {
		$this->save($this->request->param('id'));
	}

	public function action_tobbuj($id = null) {
		if ( ! empty($_POST)) {

			try {
				$archivum_ev_id = Arr::get($_POST, "archivum_ev_id");
				$archivum_szinpad_id = Arr::get($_POST, "archivum_szinpad_id", 0);
				$youtube_ids = explode("\n", Arr::get($_POST, "youtube_id"));

				foreach($youtube_ids as $youtube_id){
					$youtube_id = trim($youtube_id);
					if(!$youtube_id) continue;

					$model = ORM::factory("ArchivumVideo");
					$model->youtube_id = $youtube_id;
					$model->youtube_title = Youtube::get_title($youtube_id);
					$model->archivum_ev_id = $archivum_ev_id;
					$model->archivum_szinpad_id = $archivum_szinpad_id;
					$model->aktiv = 1;
					$model->save();
				}

				Session::instance()->set('uzenet','Videók mentve');

				$this->redirect("admin/archivum/video");
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('archivum_video'));
			}
		}

		$v = View::factory("admin/archivum/video/tobbuj");

		$model = ORM::factory("ArchivumVideo");
		$v->model = $model;
		$v->bind("errors",$errors);
		$v->evek = array("" => "(válassz)") + ORM::factory("ArchivumEv")->find_all()->as_array("id","id");
		$this->template->tartalom = $v;
	}

	public function save($id = null) {
		$model = ORM::factory("ArchivumVideo",$id);

		if ( ! empty($_POST)) {
			try {
				$model->values($_POST);
				if(!$model->loaded() and !Arr::get($_POST, "youtube_title")){
					$model->youtube_title = Youtube::get_title($model->youtube_id);
				}
				$model->aktiv = Arr::get($_POST, 'aktiv', '0');
				$model->kiemelt = Arr::get($_POST, 'kiemelt', '0');
				$model->save();

				Session::instance()->set('uzenet','Videó mentve');
				$this->redirect("/admin/archivum/video/szerkeszt/".$model->id);
			} catch (ORM_Validation_Exception $e) {
				Session::instance()->set('errors',$e->errors('hir'));
			}
		}

		$v = View::factory("admin/archivum/video/form");

		$v->model = $model;
		$v->bind("errors",$errors);
		$v->evek = array("" => "(válassz)") + ORM::factory("ArchivumEv")->find_all()->as_array("id","id");
		$v->szinpadok = $model->ev->szinpad->find_all()->as_array("id","nev");
		$this->template->tartalom = $v;
	}

	public function action_torol() {
		$this->auto_render = false;
		$model = ORM::factory("ArchivumVideo",$this->request->param("id"));

		if ($model->loaded()) {
			$model->delete();
		}

		$this->redirect("/admin/archivum/video");
	}

	public function action_sorrend() {
		$this->auto_render = false;

		parse_str($_POST['sorrend'],$array);
		$i = 1;
		$array = array_pop($array);
		foreach ($array as $a){
			$elem = ORM::factory('ArchivumVideo',$a);
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
