<?php
/** 
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php} 
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni 
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/web/fishingonorfu/fishingonorfu.hu/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'fishingonorfu_wpfish');

/** MySQL felhasználónév */
define('DB_USER', 'fishingonorfu');

/** MySQL jelszó. */
define('DB_PASSWORD', 'rockmaraton');

/** MySQL  kiszolgáló neve */
define('DB_HOST', 'localhost');

/** Az adatbázis karakter kódolása */
define('DB_CHARSET', 'utf8');

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról. 
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'e`D$x)`8U,+>phiL83$YT)T(wGR8Pe_&5Urd*{US34q#d-U2=H[KSR3(dUaO&>mS');
define('SECURE_AUTH_KEY', '4,+I=^6r-WT[*n_5:Ffvdun;4tuj@aY~SBeMY(2k]<St8BO+|))oIzh4.S)8i/q+');
define('LOGGED_IN_KEY', 'wvcMv!|cj)*gu:rJ2+QhUW1is,;</d@Q O?j]2o:R`W_{5x]A8=:ER0HBr6S8 ]c');
define('NONCE_KEY', 'e5^MGd4CVwGV(|9n+Z*01$SH&]!^+<;nefaOO-Ve?j]axd]++uj2Ow~q!XHA:u+2');
define('AUTH_SALT',        '%gRZ+_|PF@+n@C{xcf|q-zj9c!1?<?adWY_`&z|Lpwb8#a4Y228Ad-[oX)eoNT+m');
define('SECURE_AUTH_SALT', 'dT4^$@|1B m?)D]e<Xi-dmY3c/fZ$ZEnH1s3R-oDep,y4+uRKZ2+/t~8bH8b3vv#');
define('LOGGED_IN_SALT',   'eeh`Pc tD]kon`DimR-8tRx,.ms^)2s`RT-X4=*F-#p+@}{Um@GUfYvIAqt*|8A+');
define('NONCE_SALT',       'aDMoNiR{^~.vOE*Eo^v&Osf2b)kcAD=D2f{g}ZJ-9,X XI0Z#|h%Itz{`WO0u?Q2');

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix  = 'fh_';

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során. 
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

define( 'WP_AUTO_UPDATE_CORE', false );

/* Ennyi volt, kellemes blogolást! */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');
