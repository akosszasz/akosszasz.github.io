<?php defined('SYSPATH') or die('No direct script access.');

class HTTP_Exception_404 extends Kohana_HTTP_Exception_404 {

	/**
	 * Generate a Response for the 404 Exception.
	 *
	 * The user should be shown a nice 404 page.
	 *
	 * @return Response
	 */
	public function get_response() {
		if ((Kohana::$environment === Kohana::DEVELOPMENT ||
			Kohana::$environment === Kohana::TESTING || isset($_GET['DEBUG']))
			&& ! isset($_GET['NODEBUG'])) {
			return parent::get_response();
		}else{
			$attributes = array(
				'action'	=> 404,
				'message'	=> __("A keresett oldal nem található"),
				'origuri'	=> ''
			);

			$response = Request::factory(Route::url('error', $attributes))->execute();
			$response->status(404);

			return $response;
		}
	}
}
