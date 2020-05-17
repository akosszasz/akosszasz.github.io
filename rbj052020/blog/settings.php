<?php
/**
 * Created by PhpStorm.
 * User: Godla Imre
 * Date: 2017. 11. 21.
 * Time: 17:13
 */
/*** Fő változók ***/
//DB adatok
define('DBHOST', 'localhost');
define('DBUSER', 'loocaz');
define('DBPASS', 'Xlt66peN');
define('DBNAME', 'loocaz');
define('PREFIX', 'cat');
//Elérések
define('ELER1','./includes/theme/');
define('ELER2','./includes/elements/');

/*** Adatbázis catlakozás ***/
$catConn = @mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
@mysqli_set_charset($catConn,'UTF8');

//Ha nem sikerül a csatlakozás, akkor a rendszer e-mailt küld a hibáról
if(!$catConn){
    //include_once('');
}
//functions.inc validáció
$webK1 = @mysqli_query($catConn,"SELECT adat FROM ".PREFIX."_settings WHERE megnevezes = 'webKulcs' LIMIT 1");
$webK2 = @mysqli_fetch_array($webK1);
$webK = $webK2['adat'];
define('SZABAD',$webK);
/*** functions.inc ***/
include_once('functions.php');