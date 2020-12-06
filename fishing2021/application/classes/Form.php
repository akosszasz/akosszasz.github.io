<?php defined('SYSPATH') or die('No direct script access.');

class Form extends Kohana_Form {

	static function ckeditor ($name, $value, $attributes = array(), $width = 680, $height = 500, $basic = false ) {
		$attributes['id'] = $name;
		$attributes['class'] = 'ckeditor';
		$attributes['data-width'] = $width;
		$attributes['data-height'] = $height;
		$attributes['data-basictoolbar'] = $basic?'true':'false';

		return Form::textarea($name, $value, $attributes);
	}

	public static function label($input, $text = NULL, array $attributes = NULL) {
		if ($text === NULL)
		{
			// Use the input name as the text
			$text = ucwords(preg_replace('/[\W_]+/', ' ', $input));
		}

		// Set the label target
		if ( ! isset($attributes['for'])) {
			$attributes['for'] = $input;
		}

		return '<label'.HTML::attributes($attributes).'>'.$text.'</label>';
	}

	public static $options;
	static function recursiveSelect($model, $col, $sub, $depth = 0)
	{
		if ($depth == 0) {
			self::$options = array();
		}
		foreach ($model as $key => $value) {
			$spacek = "";
			for ($i=0; $i < $depth; $i++) {
				$spacek .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			self::$options[$value->pk()] = $spacek.$value->$col;
			self::recursiveSelect($value->$sub->find_all(), $col, $sub, $depth+1);
		}
		if ($depth == 0) {
			return self::$options;
		}
	}
}
