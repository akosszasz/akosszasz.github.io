<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Szoveg extends Controller_Template {

	public function action_index() {
		$szoveg = ORM::factory('Szoveg')
					->where('nyelv','=',I18N::lang())
					->where('link','LIKE',$this->request->param('link'))
					->find();

		if ( ! $szoveg->loaded()) {
			throw new HTTP_Exception_404(__("A keresett oldal nem található"));
		}

		$tartalom = View::factory('szoveg/szoveg', array('szoveg' => $szoveg));

		if($this->request->is_ajax()){
			$this->auto_render = false;
			echo View::factory("template/ajax-modal", array("title"=>$szoveg->cim, "tartalom"=>$tartalom))->render();
		}
	}

} // End Szoveg