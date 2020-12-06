<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Nemzene extends Controller_Template {

	public function before() {
		parent::before();

		$this->template->aktiv_oldal = "nemzene";
		$this->template->title = "Nemzene";

		$this->nemzene_title = array(
			'off' => 'Off-programok',
			'színház' => 'FOO Színházkert',
			'szinhaz' => 'FOO Színházkert',
			'gyerek' => 'Pagony Gyermekbirodalom',
			'mozi' => 'Mozi',
			'beszelgetesek' => 'Beszélgetések'
		);

		$aloldal_menu = array();
		$this->tipusok = array();
		$columns = ORM::factory('Offprogram')->list_columns();
		foreach($columns['tipus']['options'] as $n=>$t){
			$this->tipusok[URL::title($t, '-', true)] = $t;

			$aloldal_menu[Route::get('nemzene')->uri(array(
					"tipus" => URL::title($t, '-', true)
			))] = Arr::get($this->nemzene_title, $t, ucfirst($t));

			if($n==0) $this->default_tipus = $t;
		}

		$aloldal_menu = View::factory("elemek/aloldal-menu", array(
			"aloldal_menu" => $aloldal_menu,
			"aktiv_almenu" => Request::$current->uri()
		));

		View::set_global("aloldal_menu", $aloldal_menu);
	}

	public function action_index() {
		$this->redirect("fooldal");

		$tipus = $this->request->param("tipus");

		if(!$tipus) $this->redirect(Route::get('nemzene')->uri(array(
			"tipus" => $this->default_tipus
		)));

		if(!Arr::get($this->tipusok, $tipus)){
			throw new HTTP_Exception_404(__("A keresett oldal nem található!"));
		}


		$this->template->title = Arr::get($this->nemzene_title, $tipus, ucfirst($tipus=='szinhaz'?'színház':$tipus).ucfirst($tipus=='beszelgetesek'?'Beszélgetések':$tipus));
		$this->template->tartalom = View::factory("nemzene/lista", array(
			"lista" => ORM::factory('Offprogram')->latszik()->where('tipus','=',$tipus)->order_by('sorrend')->find_all(),
		));

		$this->template->tartalom->szoveg = ORM::factory('Szoveg')->where('link','=','programok-'.$tipus)->find();
	}


	public function action_cikk(){

		$id = $this->request->param('id');
		$this->cikk = ORM::factory('Offprogram',$id);

		if ( ! $this->cikk->loaded()) {
			throw new HTTP_Exception_404(__("A keresett oldal nem található!"));
		}

		$cikkek = ORM::factory('Offprogram')->latszik()->where('id', '!=', $this->cikk->id)->limit(2)->find_all();

		$this->template->title = $this->cikk->cim;
		$this->template->aloldal_fejlec_title = "Nemzene";
		$this->template->tartalom = View::factory('nemzene/cikk', array(
				'cikk' => $this->cikk,
				'cikkek' => $cikkek,
		));

	}
}