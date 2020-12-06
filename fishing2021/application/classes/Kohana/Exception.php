<?php defined('SYSPATH') OR die('No direct script access.');

class Kohana_Exception extends Kohana_Kohana_Exception {

	/**
	 * Exception handler, logs the exception and generates a Response object
	 * for display.
	 *
	 * @uses    Kohana_Exception::response
	 * @param   Exception  $e
	 * @return  boolean
	 */
	public static function _handler(Exception $e) {
		$show_debug =
		(Kohana::$environment === Kohana::DEVELOPMENT || Kohana::$environment === Kohana::TESTING || isset($_GET['DEBUG']))
		&& ! isset($_GET['NODEBUG']);
		try
		{
			// Log the exception
			Kohana_Exception::log($e);

			if ($show_debug) {
				// Generate the response
				$response = Kohana_Exception::response($e);

				return $response;
			}else{
				$attributes = array(
					'action'	=> 500,
					'message'	=> __("Hiba történt az oldal betöltése közben!")
				);

				$response = Request::factory(Route::url('error', $attributes))->execute();
				$response->status(500);

				return $response;
			}
		}
		catch (Exception $e)
		{
			/**
			 * Things are going *really* badly for us, We now have no choice
			 * but to bail. Hard.
			 */
			// Clean the output buffer if one exists
			ob_get_level() AND ob_clean();

			// Set the Status code to 500, and Content-Type to text/plain.
			header('Content-Type: text/plain; charset='.Kohana::$charset, TRUE, 500);

			if ($show_debug) {
				echo Kohana_Exception::text($e);
			}else{
				echo "Hiba történt az oldal betöltése közben!";
			}
			exit(1);
		}
	}
}
