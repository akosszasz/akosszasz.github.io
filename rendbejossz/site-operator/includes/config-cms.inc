<?php
ob_start();
session_start();
/*if (!defined('salsa-GWP')) {
    //die('Nincs nyulkapiszka!');
    header("Location: ../salsamojito/index.php");
    exit();
}*/
//import main variables
//require('./modules_settings.php');
require('./modules_settings.php');
//Ügyfél weboldal, fő konstansok
//define('FRONTEND', 'http://rendbejossz.dev/');
define('DIR', FRONTEND.'/site-operator');
define('SITETITLE', 'CategoryCMS - admin');
define('DIRADMIN', DIR);
define('ADDSINGLE','?addsingle=1');
define('EDITSINGLE','?editsingle=1');
// DB Ügyfél tulajdonságok
/*define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '12345678');
define('DBNAME', 'categorycms');*/
//kapcsolódás
$connGWP = @mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
@mysqli_select_db($connGWP, DBNAME);
@mysqli_set_charset($connGWP, 'UTF8');
if (!$connGWP) {
    die("Sajnálom, a csatlakozás nem sikerült.");
}

define('VALIDCODE','fejlesztésre vár: token, ami egyszeri belépésre szolgál és mentődik a db-be');
include_once 'site-elements/functions.inc';