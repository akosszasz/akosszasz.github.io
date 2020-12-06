<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sajtoakkreditacio extends ORM {

	protected $_table_name = "sajtoakkreditacio";
	protected $_sorting = array('datum'=>'DESC');

	public function rules(){
		return array(
			'medium_nev' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'medium_www' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'medium_cim' => array(
				array('not_empty'),
			),
			'medium_postacim' => array(
				//array('not_empty'),
			),
			'foszerkeszto_nev' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'foszerkeszto_telefon' => array(
				array('not_empty'),
				array('max_length', array(':value', 63))
			),
			'foszerkeszto_email' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'munkatars_nev' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'munkatars_cim' => array(
				array('not_empty'),
			),
			'munkatars_postacim' => array(
				//array('not_empty'),
			),
			'munkatars_telefon' => array(
				array('not_empty'),
				array('max_length', array(':value', 63))
			),
			'munkatars_email' => array(
				array('not_empty'),
				array('max_length', array(':value', 255))
			),
			'munkatars_tevekenyseg' => array(
				array('not_empty'),
			),
			'kereskedelmi_tevekenyseg' => array(
				array('not_empty'),
			),
			'fesztivalnapok' => array(
				array('not_empty'),
			),
			'megjegyzes' => array(),
		);
	}

	public function latszik(){
		return $this->where('aktiv', '=', 1);
	}

	public function labels($id = null){
		$labels = array(
			'medium_nev' => 'A médium neve',
			'medium_www' => 'Honlap',
			'medium_cim' => 'Pontos cím',
			'medium_postacim' => 'Levelezési cím',
			'foszerkeszto_nev' => 'Főszerkesztő neve',
			'foszerkeszto_telefon' => 'Főszerkesztő telefonszáma',
			'foszerkeszto_email' => 'Főszerkesztő e-mail címe',
			'linkek' => 'Linkek',
			'munkatars_nev' => 'A médium képviselőjének neve',
			'munkatars_cim' => 'Pontos cím',
			'munkatars_postacim' => 'Levelezési cím',
			'munkatars_telefon' => 'Telefonszám',
			'munkatars_email' => 'E-mail cím',
			'munkatars_tevekenyseg' => 'Tevékenysége',
			'kereskedelmi_tevekenyseg' => 'Kereskedelmi tevékenységet végzek',
			'fesztivalnapok' => 'Melyik napról kívánsz tudósítani',
			'megjegyzes' => 'Megjegyzés',
		);

		if($id) return Arr::get($labels, $id);

		return $labels;
	}
}
