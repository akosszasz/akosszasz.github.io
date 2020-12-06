<?php
/**
* Functions
*/
class Functions
{
	public static function email($cimzettek,$targy,$sablon,$adatok = array(), $smtp = false) {
		require_once Kohana::find_file('vendor','phpmailer');
		$m = new PHPMailer;

		if ($smtp) {
			require_once Kohana::find_file('vendor','smtp');
			$m->IsSMTP();
			$m->Host = 'lena.ferengi.hu';
		}

		$m->From = "info@pecsvarad.hu";
		$m->FromName = "Pécsvárad.hu";
		$m->Subject = $targy;

		$sablonhtml = $sablon;
		$sablonhtml = str_replace(array_keys($adatok),array_values($adatok),$sablonhtml);
		$m->MsgHTML($sablonhtml);
		if (is_array($cimzettek)) {
			foreach ($cimzettek as $email => $nev) {
				if (strpos($email,"#cc")===false && strpos($email,"#bcc")===false) {
					$m->addAddress($email,$nev);
				}
				if (strpos($email,"#cc")!==false) {
					$m->AddCC(rtrim($email,"#cc"),$nev);
				}
				if (strpos($email,"#bcc")!==false) {
					$m->AddBCC(rtrim($email,"#bcc"),$nev);
				}
			}
		}else {
			$m->addAddress($cimzettek);
		}
		$m->Send();
	}

	public static function email_smtp($cimzettek,$targy,$sablon,$adatok = array()) {
		self::email($cimzettek,$targy,$sablon,$adatok, true);
	}

	/**
	 * Kép átalakítása meghatározott méretűvé, a hiányzó részeket fehérrel tölti ki
	 *
	 * @param string $src_image_path - forrás kép
	 * @param string $dest_path - cél
	 * @param integer $width - cél szélessége
	 * @param integer $height - cél magassága
	 * @return bool
	 */
	public static function do_kocka($src_image_path, $dest_path, $width = 166, $height = 166) {

		$src_info = getimagesize($src_image_path) or exit('src_image_path nem létezik');

		switch ($src_info['mime']){
			case 'image/jpg':
			case 'image/jpeg':
			case 'image/pjpeg':
				$src_image = imagecreatefromjpeg($src_image_path);
			break;
			case 'image/png':
				$src_image = imagecreatefrompng($src_image_path);
			break;
			default:
				exit('src_image_path nem kép');
			break;
		}

		$dst_width = $width;
		$dst_height = $height;

		if ($src_info[0]>$width and $src_info[0]>$src_info[1]){
			$dst_width = $width;
			$dst_height = floor($width/$src_info[0] * $src_info[1]);
		}

		if ($src_info[1]>$height and $src_info[1]>$src_info[0]){
			$dst_width = floor($height/$src_info[1] * $src_info[0]);
			$dst_height = $height;
		}

		$dst_x = floor(($width - $dst_width) / 2);
		$dst_y = floor(($height - $dst_height) / 2);

		$im = imagecreatetruecolor($width, $height);
		$feher = imagecolorallocate($im, 255, 255, 255);

		imagefilledrectangle($im, 0, 0, $width, $height, $feher);
		imagecopyresampled($im, $src_image, $dst_x, $dst_y, 0, 0, $dst_width, $dst_height, $src_info[0], $src_info[1]);
		$res = imagejpeg($im, $dest_path, 95);
		imagedestroy($im);

		return $res;
	}

	public static function url_get_contents($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		/*
		curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		 */
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}

}
