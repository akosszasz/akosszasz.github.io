<?php
/**
* Idojaras
*/
class Idojaras
{

	/**
	* Törli a cache-ből az időjárási adatokat
	*
	*/
	private static function adattorles(){
		foreach (Kohana::$config->load('idojaras.langcodes') as $code => $lang) {
			Cache::instance(Kohana::$config->load('idojaras.cache'))->delete('wunderground_'.$code);
			Cache::instance(Kohana::$config->load('idojaras.cache'))->delete('homerseklet_'.$code);
			Cache::instance(Kohana::$config->load('idojaras.cache'))->delete('idojaras_'.$code);
		}
	}

	/**
	* Lekéri az időjárást és berakja cache-be
	*
	*	http://www.wunderground.com/weather/api/d/documentation.html
	*
	*/
	private static function adatlekeres(){
		if(!Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang())){
			// http://www.wunderground.com/weather/api/d/documentation.html#lang
			$langcodes = Kohana::$config->load('idojaras.langcodes');
			$max=1;
			
			do{
				$wunderground = json_decode(
									Functions::url_get_contents('http://api.wunderground.com/api/'.
														Kohana::$config->load('idojaras.key').
														'/lang:'.Arr::get($langcodes,i18n::lang(),'HU').
														'/hourly/astronomy/q/Hungary/Harkany.json'
									)
								);
				$max--;
			}while(isset($wunderground->response->error) || !$max);
			Cache::instance(Kohana::$config->load('idojaras.cache'))->set('wunderground_'.i18n::lang(),
																			$wunderground,
																			Kohana::$config->load('idojaras.frissites')
																		);
		}else{
			Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang());
		}
	}

	/**
	* Visszaadja az aktuáisan lekért hőmérsékletet Celzius vagy Fahrenheit fokban
	*
	* @param   string  C - Celzius, F - Fahrenheit
	* @return  integer
	*/
	public static function homerseklet($mertekegyseg = 'C'){
		if(!Cache::instance(Kohana::$config->load('idojaras.cache'))->get('homerseklet_'.i18n::lang())){
			if(!Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang())){
				Idojaras::adatlekeres();
			}
			$wunderground = Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang());

			$homerseklet = Arr::get($wunderground->hourly_forecast,0);
			Cache::instance(Kohana::$config->load('idojaras.cache'))
				->set('homerseklet_'.i18n::lang(), $homerseklet, Kohana::$config->load('idojaras.frissites'));
		}else{
			$homerseklet = Cache::instance(Kohana::$config->load('idojaras.cache'))->get('homerseklet_'.i18n::lang());
		}
		if($mertekegyseg == 'C'){
			return $homerseklet->temp->metric;
		}else{
			return $homerseklet->temp->english;
		}
	}

	/**
	* Visszaadja az aktuáisan lekért időjárás előrejelzést
	*
	*	$idojaras['icon'] - az aktuális időjárás ikonjának nevét adja vissza (clear, rain, snow, ... )
	*	$idojaras['szoveg'] - az aktuális időjárást adja vissza szöveges formában
	*
	*	http://www.wunderground.com/weather/api/d/documentation.html#forecast
	*
	* @return  array
	*/
	public static function elorejelzes(){
		if(!Cache::instance(Kohana::$config->load('idojaras.cache'))->get('idojaras_'.i18n::lang())){
			if(!Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang())){
				Idojaras::adatlekeres();
			}
			$wunderground = Cache::instance(Kohana::$config->load('idojaras.cache'))->get('wunderground_'.i18n::lang());

			$idojaras = Arr::get($wunderground->hourly_forecast,0);
			Cache::instance(Kohana::$config->load('idojaras.cache'))
				->set('idojaras_'.i18n::lang(), $idojaras, Kohana::$config->load('idojaras.frissites'));
		}else{
			$idojaras = Cache::instance(Kohana::$config->load('idojaras.cache'))->get('idojaras_'.i18n::lang());
		}

		return array('icon'=>$idojaras->icon,'szoveg'=>__($idojaras->condition));
	}

}
?>