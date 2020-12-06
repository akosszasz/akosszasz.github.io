<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Hirek extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "hirek";
		$this->template->aloldal_fejlec_title = "Hírek";
	}

	public function action_index()
	{

		$this->redirect("fooldal");
		$perpage = 1000;

		$count = ORM::factory('Hir')
//			->join('hir_fordit','LEFT')
//			->on('hir_fordit.hir_id','=','hir.id')
//			->on('hir_fordit.lang','=',DB::expr("'".I18n::lang()."'"))
			->latszik()
			->count_all();
		
		$lapozo = Pagination::factory(array(
			'current_page'      => array('source' => 'route', 'key' => 'page'),
			'total_items'       => $count,
			'items_per_page'    => $perpage,
			'view'              => 'pagination/floating',
			'auto_hide'         => TRUE,
			'first_page_in_url' => FALSE
		));

		$hirek = ORM::factory('Hir')->latszik()->order_by("datum","DESC")->offset($lapozo->offset)->limit($perpage)->find_all();

		$lista = View::factory("hirek/lista", array(
			"hirek"=>$hirek,
			"lapozo"=>$lapozo,
		));

		if($this->request->is_ajax()){
			$this->auto_render = false;
			echo $lista->render();
		} else {
			$this->template->title = __("Hírek");
			$this->template->tartalom = View::factory("hirek/index", array(
				"lista" => $lista,
			));
		}
	}

	public function action_hir(){

		if(!isset($this->hir)){
			$id = $this->request->param('id');
			$this->hir = ORM::factory('Hir',$id);
		}

		if ( ! $this->hir->loaded()) {
			throw new HTTP_Exception_404(__("A keresett oldal nem található!"));
		}

		$hirek = ORM::factory('Hir')->latszik()->where('id', '!=', $this->hir->id)->limit(2)->find_all();

		$this->template->title = $this->hir->forditva()->cim;
		$this->template->aloldal_fejlec_title = "Hírek";
		$this->template->tartalom = View::factory('hirek/hir', array(
			'hir' => $this->hir,
			'hirek' => $hirek,
		));

	}

} // End Hirek
