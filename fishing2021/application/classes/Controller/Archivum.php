<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Archivum extends Controller_Template {

	public function action_index() {
		$evek = ORM::factory("ArchivumEv")->latszik()->find_all();

		$kiemelt_videok = array();

		foreach($evek as $ev){
			$kiemelt = ORM::factory("ArchivumVideo")->where("archivum_ev_id", "=", $ev->id)->where("kiemelt", "=", 1)->order_by(DB::expr("RAND()"))->find();

			if(!$kiemelt->loaded()){
				$kiemelt = $ev->get_kiemelt_video();
			}

			$kiemelt_videok[$ev->id] = $kiemelt;
		}

		$this->template = View::factory("template/archivum", array(
			"aktiv_oldal" => "archivum",
			"title" => "Archívum",
			"evek" => $evek,
			"kiemelt_videok" => $kiemelt_videok,
		));
	}

	public function action_keres() {
		$this->auto_render = false;

		$term = Arr::get($_GET, "keres");

		if(!$term) {exit;}

		$term = addslashes($term);

		$videok = ORM::factory("ArchivumVideo")
			->join("archivum_szinpad", "left outer")
			->on("archivumvideo.archivum_szinpad_id", "=", "archivum_szinpad.id")
			->where_open()
				->where('archivumvideo.aktiv', '=', 1)
			->where_close()
			->where_open()
				->where(DB::expr("lower(archivumvideo.youtube_title)"), "like", DB::expr("lower('%".$term."%')"))
				->or_where(DB::expr("lower(archivum_szinpad.nev)"), "like", DB::expr("lower('%".$term."%')"));

		if((int)$term >= 2008 and (int)$term<=date("Y")) {
			$videok = $videok->or_where(DB::expr("archivumvideo.archivum_ev_id"), "=", $term);
		}

		$videok = $videok->where_close();

		$video_count = clone $videok;
		$video_count = $video_count->count_all();

		$videok = $videok->find_all();

		//echo Database::instance()->last_query;
		//exit;

		echo View::factory("archivum/kereses-bezar", array("db"=>$video_count))->render().
			 View::factory("archivum/videolista", array("videok"=>$videok))->render();
	}

}
