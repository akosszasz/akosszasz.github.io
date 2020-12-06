<?php defined('SYSPATH') or die('No direct script access.');

// -- Environment setup --------------------------------------------------------
$_SERVER['DOCUMENT_ROOT'] = DOCROOT;

// Load the core Kohana class
require SYSPATH.'classes/Kohana/Core'.EXT;

if (is_file(APPPATH.'classes/Kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/Kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/Kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/timezones
 */
date_default_timezone_set('Europe/Budapest');

/**
 * Set the default locale.
 *
 * @link http://kohanaframework.org/guide/using.configuration
 * @link http://www.php.net/manual/function.setlocale
 */
setlocale(LC_ALL, 'hu_HU.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @link http://kohanaframework.org/guide/using.autoloading
 * @link http://www.php.net/manual/function.spl-autoload-register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Optionally, you can enable a compatibility auto-loader for use with
 * older modules that have not been updated for PSR-0.
 *
 * It is recommended to not enable this unless absolutely necessary.
 */
// spl_autoload_register(array('Kohana', 'auto_load_lowercase'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @link http://www.php.net/manual/function.spl-autoload-call
 * @link http://www.php.net/manual/var.configuration#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('hu');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if ( ! isset($_SERVER['WL_SERVER'])) {
	$_SERVER['WL_SERVER'] = "PRODUCTION";
}

//Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['WL_SERVER']));
Kohana::$environment = Kohana::PRODUCTION;
$database = strtolower(Kohana::$environment == Kohana::TESTING ? 'testing' : 'production');

//if(isset($_SERVER['HTTP_HOST']) and $_SERVER['HTTP_HOST'] == 'daniel.szellar.com'){
if(isset($_SERVER['HTTP_HOST']) and $_SERVER['HTTP_HOST'] == 'foo2018.davidhuse.hu'){
	Kohana::$environment = Kohana::TESTING;
	$database = 'testing';
}

if(isset($_SERVER['HTTP_HOST']) and $_SERVER['HTTP_HOST'] == 'localhost'){
	Kohana::$environment = Kohana::TESTING;
	$database = 'development';
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - integer  cache_life  lifetime, in seconds, of items cached              60
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 * - boolean  expose      set the X-Powered-By header                        FALSE
 */
Kohana::init(array(
	'base_url'   => Kohana::$environment==Kohana::TESTING ? '/' : '',
	'index_file' => Kohana::$environment==Kohana::TESTING ? 'index.php' : ''
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
Kohana::modules(array(
	'auth'       => MODPATH.'auth',       // Basic authentication
	'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database',   // Database access
	'image'      => MODPATH.'image',      // Image manipulation
	'minion'     => MODPATH.'minion',     // CLI Tasks
	'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	'pagination' => MODPATH.'pagination',  // Kohana Pagination
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	'captcha'	 => MODPATH.'captcha',
	));

Database::$default  = $database;

Cookie::$salt = "ZizRqs4fxsH5ntCU";

$nyelvek = implode('|',array_keys(Kohana::$config->load('nyelvek.nyelvek')));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

Route::set('hir', 'hirek/<id>/<cim>')
->defaults(array(
	'controller' => 'hirek',
	'action'     => 'hir',
));

Route::set('hirek', 'hirek(/oldal:<page>)')
->defaults(array(
	'controller' => 'hirek',
	'action'     => 'index',
));

Route::set('program', 'program')
->defaults(array(
	'controller' => 'program',
	'action'     => 'index',
));

Route::set('kontakt', 'kontakt')
->defaults(array(
	'controller' => 'kontakt',
	'action'     => 'index',
));

Route::set('szulinap', 'szulinap')
->defaults(array(
	'controller' => 'szulinap',
	'action'     => 'index',
));

Route::set('tamogatok', 'tamogatok')
->defaults(array(
	'controller' => 'tamogatok',
	'action'     => 'index',
));

Route::set('tamogatas', 'tamogatas')
->defaults(array(
	'controller' => 'tamogatas',
	'action'     => 'index',
));

Route::set('kozlemeny', 'kozlemeny')
->defaults(array(
	'controller' => 'kozlemeny',
	'action'     => 'index',
));

Route::set('foo-klub', 'foo-klub')
->defaults(array(
	'controller' => 'kontakt',
	'action'     => 'fooklub',
));

Route::set('tamogatas', 'tamogatas')
->defaults(array(
	'controller' => 'kontakt',
	'action'     => 'tamogatas',
));

Route::set('kozlemeny', 'kozlemeny')
->defaults(array(
	'controller' => 'kontakt',
	'action'     => 'kozlemeny',
));

/*Route::set('dicsosegfal', 'dicsosegfal')
->defaults(array(
	'controller' => 'kontakt',
	'action'     => 'dicsosegfal',
));*/

Route::set('error', 'error/<action>(/<origuri>(/<message>))', array('action' => '[0-9]++', 'message' => '.+'))
->defaults(array(
	'controller' => 'error',
	'action'     => 'index'
));

Route::set('jegytipus', 'jegyek(/<jegytipus>)', array('jegytipus' => '.+'))
->defaults(array(
	'controller' => 'jegyek',
	'action'     => 'index'
));

Route::set('nemzene-cikk', 'nemzene/<id>/<cim>')
	->defaults(array(
		'controller' => 'nemzene',
		'action'     => 'cikk',
	));

Route::set('nemzene', 'nemzene(/<tipus>)', array('tipus' => '.+'))
->defaults(array(
	'controller' => 'nemzene',
	'action'     => 'index'
));

Route::set('archivum-admin', 'admin/archivum(/<controller>(/<action>(/<id>(/<id2>))))')
->defaults(array(
	'directory'  => 'Admin/Archivum',
	'controller' => 'ev',
	'action'     => 'index',
));

Route::set('archivum', 'archivum')
->defaults(array(
	'controller' => 'archivum',
	'action'     => 'index',
));

Route::set('archivum-keres', 'archivum/keres')
->defaults(array(
	'controller' => 'archivum',
	'action'     => 'keres',
));

Route::set('default-admin', 'admin(/<controller>(/<action>(/<id>(/<id2>))))')
->defaults(array(
	'directory'  => 'admin',
	'controller' => 'hirek',
	'action'     => 'index',
));


Route::set('szoveg', '(<nyelv>/)<link>',array('nyelv'=>$nyelvek,'link'=>'.+'))
	->filter(function($route, $params, $request){
		$linkek = explode("/",$params['link']);
		$szoveg = ORM::factory('Szoveg')
			->where('nyelv','LIKE',$params['nyelv'])
			->where('link','LIKE',$params['link'])
			->find();

		if ($szoveg->loaded()) {
			return $szoveg->loaded();
		}
		return false;
	})
	->defaults(array(
		'controller' => 'szoveg',
		'action'     => 'index',
		'nyelv'      => 'hu',
));

Route::set('csaknyelv', '<nyelv>', array('nyelv'=>$nyelvek))
->defaults(array(
		'controller' => 'fooldal',
		'action'     => 'index',
		'nyelv'		 => 'hu'
	));

Route::set('default', '(<nyelv>/)(<controller>(/<action>(/<id>(/<id2>))))', array('nyelv'=>$nyelvek))
		->defaults(array(
				'controller' => 'fooldal',
				'action'     => 'index',
				'nyelv'		 => 'hu'
		));

/*
Route::set('default', '', array('nyelv'=>$nyelvek))
->defaults(array(
		'controller' => 'fooldal',
		'action'     => 'index',
		'nyelv'		 => 'hu'
	));
*/