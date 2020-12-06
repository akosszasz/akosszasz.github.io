<?php defined('SYSPATH') or die('No direct script access.');

class ORM extends Kohana_ORM {
	protected $_table_names_plural = false;

	// cache-elés miatt kellett átállítani
	protected $_reload_on_wakeup = FALSE;
	/**
	* Delete all objects in the associated table. This does NOT destroy
	* relationships that have been created with other objects.
	*
	* @chainable
	* @return ORM
	*/
	public function delete_all() {
		$this->_build(Database::DELETE);

		$this->_db_builder->execute($this->_db);

		return $this->clear();
	}

	/**
	 * Több-több hozzárendelés változtatásainak mentése. Csak azt az összerendelést törli, ami eddig létezett,
	 * de most megszűnik, és csak azokat a hozzárendeléseket adja hozzá, ami eddig nem létezett, de most fog.
	 *
	 * @param $tartozo_elemek jelenleg hozzárendelt elemek
	 * @param $elemek az új állapot, pl. a posztolt id-k
	 * @param $kapcsolat a has_many-ben definiált kapcsolat neve
	 *
	 * @return void
	 * @author Tolnai Zoltán
	 **/
	public function save_many(&$tartozo_elemek, &$elemek, $kapcsolat)
	{
		$model = $this->_has_many[$kapcsolat]['model'];

		if (!isset($elemek)) {
			$elemek = array();
		}
		foreach ($tartozo_elemek as $key => $id) {
			if (!in_array($id,$elemek)) {
				$this->remove($kapcsolat,ORM::factory($model,$id));
				unset($tartozo_elemek[$id]);
			}
		}

		foreach ($elemek as $key => $id) {
			if (!in_array($id,$tartozo_elemek)) {
				try {
					$this->add($kapcsolat,ORM::factory($model,$id));
					$tartozo_elemek[$id] = $id;
				} catch (Database_Exception $e) {
				}
			}
		}
	}
}