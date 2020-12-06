<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_User extends Model_Auth_User {
	protected $_table_names_plural = false;
	// This class can be replaced or extended

	public function rules() {
		$rules = parent::rules();
		unset($rules['username']);
		return $rules;
	}

	public function labels() {
		return array(
			"email"=>"E-mail",
			"password"=>"Jelszó",
			"password_confirm"=>"Jelszó újból"
		);
	}

	public static function get_password_validation($values) {
		$validation = parent::get_password_validation($values);
		return $validation
			->rule('password', 'not_empty')
			->label('password','Jelszó')
			->label('password_confirm','Jelszó megerősítése');
	}

} // End User Model