<?php

/**
*
*/
class FFmpeg
{
	public $file;
	public $ffmpeg = "/opt/local/bin/ffmpeg";
	private $mov;
	function __construct($file) {
		$this->file = $file;
		if (class_exists("ffmpeg_movie")) {
			$this->mov = new ffmpeg_movie($file);
		}
	}

	public static function generate_random_thumbnail($file) {
		set_time_limit(0);
		$ff = new FFmpeg($file);
		$len = $ff->get_length();

		$kepfile = pathinfo($file,PATHINFO_DIRNAME)."/th/".pathinfo($file,PATHINFO_FILENAME).".jpg";
		$ff->image_at(rand(1, ($len - 1)),$kepfile);
		$ff = null;
		return $kepfile;
	}

	public function get_length() {
		if ( ! is_null($this->mov)) {
			return $this->mov->get_duration();
		} else {
			$cmd = $this->ffmpeg." -i ".$this->file." 2>&1";
			if (preg_match('/Duration: ((\d+):(\d+):(\d+))/s', `$cmd`, $time)) {
				$total = ($time[2] * 3600) + ($time[3] * 60) + $time[4];
				return $total;
			}
		}
	}

	public function image_at($pos,$save) {
		if ( ! is_null($this->mov)) {
			$frame = $this->mov->getFrame($this->mov->getFrameRate()*$pos);

			$db = 0;
			while ( ! $frame && $db++<5) {
				$frame = $this->mov->getNextKeyFrame();
			}

			if ($frame) {
				$gd_frame = $frame->toGDImage();
				imagejpeg($gd_frame,$save,95);
			}else{
				copy( $_SERVER['DOCUMENT_ROOT'].'/media/img/mp4.png' , $save );
			}
		}else {
			$cmd = $this->ffmpeg." -i "
			      .$this->file." -deinterlace -an -ss $pos -t 00:00:01 -r 1 -y -vcodec mjpeg -f mjpeg $save 2>&1";
			$return = `$cmd`;
		}
	}

}


?>
