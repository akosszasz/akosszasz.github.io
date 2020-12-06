<?PHP


$mysql= array (

	'host'	=>	'127.0.0.1',
	'user'	=>	'fishingonorfu',
	'pass'	=>	'zay352118 ',
	'db'	=>	'fishingonorfu',

);
$mysql_connect=mysql_connect($mysql['host'], $mysql['user'], $mysql['pass']);

if(!$mysql_connect) {
	print('<b>MySQL problem:</b> '.mysql_error());
}

if(!mysql_select_db($mysql['db'], $mysql_connect)) {
	print('<b>MySQL problem:</b> '.mysql_error());
}

    mysql_query("SET CHARACTER SET utf8");
    mysql_query("SET NAMES utf8");

#mysql_close($mysql_connect);

// Az eredményhalmaz által lefoglalt eroforrást fel kell szabadítani
// Ez automatikusan megtörténne a szkript futásának végén
// mysql_free_result($eredmeny);
?>
