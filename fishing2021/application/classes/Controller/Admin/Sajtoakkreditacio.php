<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Sajtoakkreditacio extends Controller_Admin_Template
{

	public function before(){
		parent::before();
		$this->template->title = "Sajtóakkreditáció";
	}

	public function action_index(){
		$model = ORM::factory("Sajtoakkreditacio")->order_by("datum", "desc");

		$this->template->tartalom = View::factory("admin/sajtoakkreditacio/lista", array(
			"lista" => $model->find_all(),
			"model" => $model,
		));
	}

	public function action_details() {
		$id = $this->request->param('id');
		$model = ORM::factory('Sajtoakkreditacio', $id);

		$this->template->tartalom = View::factory('admin/sajtoakkreditacio/details')
			->bind('model', $model);
	}

}