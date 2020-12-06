<?php defined('SYSPATH') or die('No direct script access.');

abstract class Image extends Kohana_Image {
	public static $default_driver = 'GD';

	public function grayscale() {
		// Loads image if not yet loaded
		$this->_load_image();

		if (function_exists("imagefilter")) {
			imagefilter($this->_image,IMG_FILTER_GRAYSCALE);
		}else {
			$this->_to_gray();
		}
	}

	public function _to_gray() {
		for ($c=0;$c<256;$c++) {
			$palette[$c] = imagecolorallocate($this->_image,$c,$c,$c);
		}
		$width=imagesx($this->_image);
		$height=imagesy($this->_image);

		for ($y=0;$y<$height;$y++) {
			for ($x=0;$x<$width;$x++) {
				$rgb = imagecolorat($this->_image,$x,$y);
				$r = ($rgb >> 16) & 0xFF;
				$g = ($rgb >> 8) & 0xFF;
				$b = $rgb & 0xFF;

				// This is where we actually use yiq to modify our rbg values, and then convert them to our grayscale palette
				$gs = $this->yiq($r,$g,$b);
				imagesetpixel($this->_image,$x,$y,$palette[$gs]);
			}
		}

	}
	public function yiq($r,$g,$b) {
		return (($r*0.299)+($g*0.587)+($b*0.114));
	}

}
