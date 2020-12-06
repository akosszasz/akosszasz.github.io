<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Template extends Kohana_Controller_Template {
	public $template = "template/default";

	public function is_fooldal() {
		return Arr::get($_SERVER,"REQUEST_URI")=="" ||
		       Arr::get($_SERVER,"REQUEST_URI")=="/";
	}

	public function before() {
		parent::before();

		if ($this->request->is_ajax()) {
		    $this->auto_render = false;
		}

		if ($this->request->param('nyelv')) {
			I18n::lang($this->request->param('nyelv'));
			setlocale(LC_ALL, Kohana::$config->load('nyelvek.kodok.'.I18n::lang()).'.utf-8');
		}

		$this->template->title = false;
		$this->template->tartalom = null;
		$this->template->aktiv_oldal = null;
	}

} // End Template
