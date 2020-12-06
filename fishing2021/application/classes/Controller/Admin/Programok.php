<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin_Programok extends Controller_Admin_Template {

	public function before() {
		parent::before();
		$this->template->title = "Programok";
	}

	public function action_index()
	{

		$programok = ORM::factory('Program')->order_by("datum","DESC")->find_all();

		$this->template->tartalom = View::factory("admin/programok/lista",array(
			"programok"=>$programok
		));
	}

	public function action_hozzaadas()
	{
		$this->mentes();
	}

	public function action_szerkesztes()
	{
		$this->mentes($this->request->param("id"));
	}

	public function mentes($id = null)
	{
		$program = ORM::factory('Program',$id);

		$forditasok = array();
		foreach (Kohana::$config->load('nyelvek.nyelvek') as $k => $nyelv) {
			$forditas = ORM::factory('Programfordit');
			$forditas = $forditas->where('program_id','=',$id)->where('lang','=',$k)->find();
			$forditasok[$k] = $forditas;
		}

		if (! empty($_POST)) {
			$_POST["latszik"] = Arr::get($_POST,"latszik",0);
			$_POST["kiemelt"] = Arr::get($_POST,"kiemelt",0);
			$_POST["rendezveny"] = Arr::get($_POST,"rendezveny",0);
			$_POST["vege"] = Arr::get($_POST,"vege",null);
			if (empty($_POST["vege"]) || $_POST["vege"] == '0000-00-00') {
				$_POST["vege"] = null;
			}

			try {
				$program->values($_POST);
				
				/*
				$kiemelt=ORM::factory('Program');
				$kiemelt=$kiemelt->where('kiemelt','=',1)->find();
				if($program->kiemelt && $kiemelt!=$program->id){
					Database::instance()->query(Database::UPDATE, "update program set kiemelt=0 where kiemelt = 1");
				}
				 */
				
				$program->save();
				$this->do_crop($program);

				foreach ($forditasok as $ny => $ford) {
					$ford->program_id = $program->id;
					$ford->cim = $_POST['cim_'.$ny];
					$ford->lead = $_POST['lead_'.$ny];

					$ford->leiras = $_POST['leiras_'.$ny];

					$ford->seotitle = Arr::get($_POST, 'seotitle_'.$ny)?$_POST['seotitle_'.$ny]:$_POST['cim_'.$ny];
					$ford->seokeywords = Arr::get($_POST, 'seokeywords_'.$ny);
					$ford->seodescription = Arr::get($_POST, 'seodescription_'.$ny);
					$ford->alt = Arr::get($_POST, 'alt_'.$ny)?$_POST['alt_'.$ny]:$_POST['cim_'.$ny];

					$ford->lang = $ny;

					$ford->save();
				}
				
				$program->remove("dokumentum");
				if(Arr::get($_POST, "dokumentumok")){
					$program->add("dokumentum", Arr::get($_POST, "dokumentumok", array()));
				}

				Session::instance()->set('uzenet','Program mentve');
				$this->redirect("/admin/programok/szerkesztes/".$program);
			} catch (ORM_Validation_Exception $e) {
				$hibak = $e->errors("asdf");
			}

		}

		$dokumentumok = array();
		foreach (ORM::factory('Dokumentum')->order_by("nev", "asc")->find_all() as $dok) {
			$dokumentumok[$dok->id] = $dok->nev;
		}
		
		$galeriak = ORM::factory('Galeriafordit')->where('lang','=','hu')->find_all()->as_array('galeria_id','cim');
		Arr::unshift($galeriak,"","Nincs galéria");

		$this->template->tartalom = View::factory("admin/programok/form",array(
			'program'=>$program,
			'forditasok'=>$forditasok,
			'dokumentumok'=>$dokumentumok,
			'galeriak'=>$galeriak,
		));
	}

	public function action_torles()
	{
		$program = ORM::factory('Program',$this->request->param('id'));

		if ($program->loaded()) {
			$program->delete();
		}
		$this->redirect("/admin/programok");
	}

	public function action_kepfeltoltes() {
		$this->auto_render = false;

		$id = $this->request->param('id');

		$feltolto = new Kepfeltoltes;
		$rules = $feltolto->get_rules();
		$rules['resize'] = true;
		$rules['ifbigger'] = true;
		$rules['width'] = 1024;
		try {
			$feltolto->feltolt(	'Program',
								'userfiles/programok/'.$id.'/',
								'hash',
								$id,
								$rules);
		}
		catch (KepException $e){
			$error['hiba'] = $e->get_message();
			echo json_encode($error);
		}
	}

	public function do_crop($m) {
		$d = Arr::get($_POST,'kep_c');
		if (isset($d['w']) && $d['w']>0 && isset($d['h']) && $d['h']>0 && file_exists(('userfiles/programok/'.$m->id.'/'.$m->hash))) {
			if ( ! is_dir('userfiles/programok/'.$m->id.'/th/'.$m->id)) {
				mkdir('userfiles/programok/'.$m->id.'/th/'.$m->id,0777,true);
			}

			$im = Image::factory('userfiles/programok/'.$m->id.'/'.$m->hash);
			$im->crop($d['w'],$d['h'],$d['x'],$d['y']);
			$im->resize(220,140);
			$im->save('userfiles/programok/'.$m->id.'/th/'.$m->hash);
		}
	}

} // End Admin_Programajanlo
