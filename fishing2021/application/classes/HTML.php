<?php defined('SYSPATH') or die('No direct script access.');

class HTML extends Kohana_HTML {

	/**
	 * Twitter Bootstrap ikon
	 * 
	 * @param array $attr HTML attributes
	 * @return string HTML
	 */
	public static function ikon($attr){
		return '<i'.HTML::attributes(is_array($attr) ? $attr : array('class' => $attr)).'></i>';
	}

	/**
	 * HTML::ikon() alias
	 */
	public static function icon($param) {
		return self::ikon($param);
	}

	public static function style_rev($css, $rev_manifest = null){
		if($rev_manifest===null) $rev_manifest = DOCROOT . "media/css/rev-manifest.json";

		$json = json_decode(file_get_contents($rev_manifest), true);

		$file = Arr::get($json, basename($css));

		return HTML::style($file ? dirname($css)."/".$file : $css);
	}

	public static function script_rev($js, $rev_manifest = null){
		if($rev_manifest===null) $rev_manifest = DOCROOT . "media/js/rev-manifest.json";

		$json = json_decode(file_get_contents($rev_manifest), true);

		return HTML::script(dirname($js)."/".Arr::get($json, basename($js)));
	}

}