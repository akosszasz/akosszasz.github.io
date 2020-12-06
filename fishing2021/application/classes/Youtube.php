<?php defined('SYSPATH') or die('No direct script access.');

/**
*
*/
class Youtube
{
	/**
	 * https://www.labnol.org/internet/light-youtube-embeds/27941/
	 */
	public static function embed($id){
		return '<div class="youtube-player" data-id="'.$id.'"></div>';
	}

	public static function iframe($id, $width, $height, $autoplay = false, $responsive = false) {
		return '
		<iframe class="hidden-print'.($responsive ? ' embed-responsive-item' : null).'" width="'.$width.'" height="'.$height.'" src="//www.youtube.com/embed/'.$id.'?rel=0&wmode=opaque'.($autoplay?'&autoplay=1':null).'" frameborder="0" style="max-width: 100%;" allowfullscreen></iframe>
		';
	}

	public static function get_id($url) {
		if (substr($url, 4, 1) == 's') {
			return str_replace("https://www.youtube.com/watch?v=", "", $url);
		} else {
			return str_replace("http://www.youtube.com/watch?v=", "", $url);
		}
	}

	public static function get_link($id) {
		return "http://www.youtube.com/watch?v=".$id;
	}
	
	public static function get_thumbnail_link($id, $n = 0){
		return sprintf("http://img.youtube.com/vi/%s/%d.jpg", $id, $n);
	}


	public static function get_title($id) {
		$api_key = Kohana::$config->load("google.api.key");

		if(!$api_key) return false;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=".$api_key."&fields=items(id,snippet(title))&part=snippet");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$videoTitle = curl_exec($ch);
		curl_close($ch);

		if ($videoTitle) {
			return ' ';

			$json = json_decode($videoTitle, true);
			var_dump($json);exit;

			return $json['items'][0]['snippet']['title'];
		} else {
			return false;
		}
	}
}