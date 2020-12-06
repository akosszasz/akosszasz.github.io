<?php defined('SYSPATH') or die('No direct script access.');

/**
*
*/
class Task_Admin extends Minion_Task
{
	protected function _execute(array $params) {
		$email = Minion_CLI::read("email");
		$admin_user = ORM::factory('user')->where('email','=',$email)->find();
		if ($admin_user->loaded()) {
			$admin_user->password = Minion_CLI::read("password");
			$admin_user->save();
			echo "Letezo admin jelszavanak csereje megtortent! \n";
		}else{
			$admin = ORM::Factory('Role',array('name'=>'admin'));
			if ( ! $admin->loaded()) {
				$admin->name = 'admin';
				$admin->description = 'Joga van belépni az admin felületre';
				$admin->save();
			}

			$login = ORM::Factory('Role',array('name'=>'login'));
			if ( ! $login->loaded()) {
				$login->name = 'login';
				$login->description = 'Bejelentkezési jog';
				$login->save();
			}

			$user = ORM::Factory('User');
			$user->username = 'admin';
			$user->password = Minion_CLI::read("password");
			$user->email = 'admin@ferlingwebline.hu';
			$user->save();

			$user->add('roles',ORM::Factory('Role',array('name'=>'login')));
			$user->add('roles',ORM::Factory('Role',array('name'=>'admin')));
			echo "Admin felhasznalo letrehozva! \n";
		}




	}
}