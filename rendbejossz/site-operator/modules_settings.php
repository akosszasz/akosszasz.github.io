<?php
/**
 * This file contains the main settings for the CMS
 */

/*** CMS FRONTEND URL ***/
define('FRONTEND', 'http://rendbejossz.hu');
define('NAME', 'Rend.Be.Jössz Tanácsadó Központ');
/*** ÜGYFÉL ADATBÁZIS KAPCSOLAT ADATOK ***/
define('DBHOST', 'localhost');
define('DBUSER', 'loocaz');
define('DBPASS', 'Xlt66peN');
define('DBNAME', 'loocaz');
define('PREFIX', 'cat');
define('DBCONNECTION', '@mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);');
/*** MÉDIA MODUL ***/
// Fő beállítások. A többi a filemanager/config/confog.php-ban található.
/*$mb_internal_encoding = 'UTF-8';
$mb_http_output = 'UTF-8';
$mb_http_input = 'UTF-8';
$mb_language = 'uni';
$mb_regex_encoding = 'UTF-8';
$ob_start = 'mb_output_handler';
$date_default_timezone_set = 'Europe/Budapest';
// File elérések
$baseUrl = FRONTEND;
$uploadDir = '/site-operator/includes/uploads/singles-img/';
$currentPath = '../uploads/singles-img/';
$thumbsBasePath = 'thumbs/';
// FTP beállítások a megjelenítéshez
$ftpHost = false;
$ftpUser = "";
$ftpPass = "";
$ftpBaseFolder = "site-operator/includes/uploads/singles-img";
$ftpBaseUrl = FRONTEND;
// path from ftp_base_folder to base of thumbs folder with start and final
$ftpThumbDir = FRONTEND.$uploadDir.'thumbs';
$ftpSsl = false;
$ftpPort = 21;
// file settings
$maxSizeTotal = true;
$maxSizeUpload = 8;
$fileFolderPermission = '0755';
// language
$defaultLanguage = "hu_HU";*/
/*** KÉPVÁGÓ MODUL ***/
$aspectRatioThumb = "1";
$aspectRatioFull1 = "1349";
$aspectRatioFull2 = "586.52";
/*** KÉPEK, SZÍNEK *///
$favicon = "<link rel=\"icon\" href=\"".FRONTEND."/img/logofav.ico\">";
$menukep = "../../../img/logo-round2.png";
$adminBoxBgColor = "#68d1c9";