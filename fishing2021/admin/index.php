<?PHP

set_include_path(dirname(__FILE__));
include("./conf/mysql.php");


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic');
    header('HTTP/1.0 401 Unauthorized');
    include('./unauthorized.php');
    exit;
} else {
	$result = mysql_query('SELECT `id` FROM `admin` WHERE `username`="'.$_SERVER['PHP_AUTH_USER'].'" and `password`=PASSWORD("'.$_SERVER['PHP_AUTH_PW'].'")');
	$num_rows = mysql_num_rows($result);

	if($num_rows==1) {


$query=mysql_query('SELECT `id` FROM `admin` WHERE `username`="'.$_SERVER['PHP_AUTH_USER'].'"');
$result_userid=mysql_fetch_assoc($query);
mysql_free_result($query);

$aid=$result_userid['id'];

mysql_query("UPDATE `admin` SET `lastlogin`=CURRENT_TIMESTAMP WHERE `id`='".$result_userid['id']."'")or die(mysql_error());



if(isset($_POST['title']) and isset($_POST['text']) and isset($_POST['hir'])  and !isset($_POST['id'])) {

	mysql_query('INSERT INTO `hirek` (`title`,`text`) VALUES("'.$_POST['title'].'","'.$_POST['text'].'")');
	header('Location: /admin/');
}

if(isset($_POST['title']) and isset($_POST['text']) and isset($_POST['sajto']) and !isset($_POST['id'])) {

	mysql_query('INSERT INTO `sajto` (`title`,`text`) VALUES("'.$_POST['title'].'","'.$_POST['text'].'")');
	header('Location: /admin/');
}

if($_REQUEST['torol']) {
	
	switch($_REQUEST['hol']) {
		case 'hirek':
			mysql_query('DELETE FROM `hirek` WHERE `hirek`.`id` = "'.$_REQUEST['torol'].'" LIMIT 1;');
		break;
		case 'sajto':
			mysql_query('DELETE FROM `sajto` WHERE `sajto`.`id` = "'.$_REQUEST['torol'].'" LIMIT 1;');
		break;
	}
	
	header('Location: /admin/');
	
}

if($_POST['szerkeszt']) {
	
	switch($_POST['szerkeszt']) {
		case 'hirek':
			mysql_query('UPDATE `hirek` SET `title` =  "'.$_POST['title'].'",`text` = "'.$_POST['text'].'" WHERE `hirek`.`id` ="'.$_POST['id'].'" LIMIT 1 ;');
		break;
		case 'sajto':
			mysql_query('UPDATE `sajto` SET `title` =  "'.$_POST['title'].'",`text` = "'.$_POST['text'].'" WHERE `sajto`.`id` ="'.$_POST['id'].'" LIMIT 1 ;');
		break;
	}
	
	header('Location: /admin/');
	
}


if($_REQUEST['szerkeszt']) {
	
	switch($_REQUEST['hol']) {
		case 'hirek':
			$query=mysql_query('SELECT * FROM `hirek` WHERE `id`="'.$_REQUEST['szerkeszt'].'"');
			$result_hirek=mysql_fetch_assoc($query);
		break;
		case 'sajto':
			$query=mysql_query('SELECT * FROM `sajto` WHERE `id`="'.$_REQUEST['szerkeszt'].'"');
			$result_sajto=mysql_fetch_assoc($query);
		break;
	}

	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu" lang="hu">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="hu" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="imagetoolbar" content="no" />

		<title>FOO Admin 0.1.2</title>
	<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
}
body {
	background-color: #FFFFFF;
}
a:link {
	color: #003366;
}
a:visited {
	color: #003366;
}
a:hover {
	color: #009933;
}
a:active {
	color: #FF0000;
}
-->
</style></head>
	<body>



<div style="width:400px; position:relative; float:left; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000; margin:20px 20px 20px 20px">

<fieldset  style="padding:10px 10px 10px 10px; border:none;">
	<legend  style="font-family:'Trebuchet MS', Verdana, Arial; color:#666666; font-size:20px; font-weight:bold;">H&iacute;rek</legend>
<form action="/admin/index.php" method="post">
	<input type="hidden" name="hir" value="true" />
	<?PHP
		if(isset($_REQUEST['szerkeszt']) and $_REQUEST['hol']=='hirek') {
		?>
			<input type="hidden" name="id" value="<?PHP print $result_hirek['id']; ?>"  />
			<input type="hidden" name="szerkeszt" value="hirek"  />
		<?PHP
		
		}
	?>
	<p>
		<label>C&iacute;m:<br />
			<input type="text" name="title" value="<?PHP print $result_hirek['title']; ?>" style="width:100%;" />
		</label>
	</p>
	<p>
		<label>Sz&ouml;veg:<br />
			<textarea name="text" style="width:100%; height:200px"><?PHP print $result_hirek['text']; ?></textarea>
		</label>
	</p>
	<p>
		<input type="submit" name="submit" value="Ment&eacute;s" />
	</p>
</form>
	
	<br /><br /><br />
	<table border="0" cellspacing="0">
	
	<?PHP
		$query=mysql_query('SELECT * FROM `hirek` ORDER BY `regdate` DESC');
		while($result=mysql_fetch_assoc($query)) {
			
	?>
	
		<tr>
			<td width="304" align="left" valign="top"  style="border-top:#CCCCCC 1px solid; padding-bottom:10px; padding-top:10px;">
				<span style="color:#999999; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px;"><?PHP print date('Y-m-d H:i',strtotime($result['date'])); ?></span><br />
				<span style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><?PHP print $result['title']; ?></span>
			</td>
			<td width="60" align="center" valign="middle"  style="border-top:#CCCCCC 1px solid; padding-bottom:10px; padding-top:10px;">
				<a href="index.php?szerkeszt=<?PHP print $result['id']; ?>&amp;hol=hirek">Szerkeszt</a><br />
				<a href="index.php?torol=<?PHP print $result['id']; ?>&amp;hol=hirek">T&ouml;r&ouml;l</a>			</td>
		</tr>
	<?PHP
		}
		
		mysql_free_result($query);
	?>
	</table>
	
</fieldset>
</div>



<div style="width:400px; position:relative; float:left; background-color: #FFFFFF; layer-background-color: #FFFFFF; border: 1px none #000000; margin:20px 20px 20px 20px">

<fieldset style="padding:10px 10px 10px 10px; border:none;">
	<legend style="font-family:'Trebuchet MS', Verdana, Arial; color:#666666; font-size:20px; font-weight:bold;">Sajt&oacute; h&iacute;rek</legend>
<form action="/admin/index.php" method="post">
	<input type="hidden" name="sajto" value="true"  />
	<?PHP
		if(isset($_REQUEST['szerkeszt']) and $_REQUEST['hol']=='sajto') {
		?>
			<input type="hidden" name="id" value="<?PHP print $result_sajto['id']; ?>"  />
			<input type="hidden" name="szerkeszt" value="sajto"  />
		<?PHP
		
		}
	?>
	<p>
		<label>C&iacute;m:<br />
			<input type="text" name="title" value="<?PHP print $result_sajto['title']; ?>" style="width:100%;" />
		</label>
	</p>
	<p>
		<label>Sz&ouml;veg:<br />
			<textarea name="text"  style="width:100%; height:200px;" ><?PHP print $result_sajto['text']; ?></textarea>
		</label>
	</p>
	<p>
		<input type="submit" name="submit" value="Ment&eacute;s" />
	</p>
</form>
		<br /><br /><br />
	<table border="0" cellspacing="0">
	
	<?PHP
		$query=mysql_query('SELECT * FROM `sajto` ORDER BY `regdate` DESC');
		while($result=mysql_fetch_assoc($query)) {
			
	?>
	
		<tr>
			<td width="304" align="left" valign="top"  style="border-top:#CCCCCC 1px solid; padding-bottom:10px; padding-top:10px;">
				<span style="color:#999999; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px;"><?PHP print date('Y-m-d H:i',strtotime($result['date'])); ?></span><br />
				<span style="color:#000000; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px;"><?PHP print $result['title']; ?></span>
			</td>
			<td width="60" align="center" valign="middle"  style="border-top:#CCCCCC 1px solid; padding-bottom:10px; padding-top:10px;">
				<a href="index.php?szerkeszt=<?PHP print $result['id']; ?>&amp;hol=sajto">Szerkeszt</a><br />
				<a href="index.php?torol=<?PHP print $result['id']; ?>&amp;hol=sajto">T&ouml;r&ouml;l</a>			</td>
		</tr>
	<?PHP
		}
		
		mysql_free_result($query);
	?>
	</table>
</fieldset>
</div>


</body>
</html>
<?PHP
	} else {
		header('WWW-Authenticate: Basic');
	    header('HTTP/1.0 401 Unauthorized');
	    include('./unauthorized.php');
	    exit;
	}
} 

?>