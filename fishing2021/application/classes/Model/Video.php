<?php

defined('SYSPATH') or die('No direct script access.');

class Model_Video extends ORM {

	protected $_table_name = "video";
	public function rules() {
		return array(
			'cim' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'youtube_id' => array(
				array('not_empty'),
			),
		);
	}

	public function labels() {
		return array(
			'cim' => 'Cím',
			'youtube_id' => 'Youtube ID',
		);
	}

	public function iframe() {
		return Youtube::iframe($this->youtube_id, 600, 450);
	}

	public function youtube_link() {
		return $this->loaded() ? "//www.youtube.com/embed/".$this->youtube_id : false;
	}
	
	public function get_link() {
		return Route::get("default")->uri(array(
			"nyelv"=> "",
			"controller" => "galeria",
			"action" => "video",
			"id"=>$this->id,
			"id2"=>URL::title($this->cim,"-",true)
		));
	}
	
	/**
	 * Youtube video thumbnail
	 * http://stackoverflow.com/questions/2068344/how-do-i-get-a-youtube-video-thumbnail-from-the-youtube-api
	 * 
	 * @return string
	 */
	public function get_kiskep() {
		return "http://img.youtube.com/vi/".$this->youtube_id."/hqdefault.jpg";
	}

}
