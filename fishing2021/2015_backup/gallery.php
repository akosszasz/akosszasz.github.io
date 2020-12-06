<?PHP

$date	=	(isset($_REQUEST['day']) and !empty($_REQUEST['day']))	? $_REQUEST['day']	: NULL;
$p		=	(isset($_REQUEST['p']) and !empty($_REQUEST['p']))		? $_REQUEST['p']	: 1;
$img	=	(isset($_REQUEST['img']) and !empty($_REQUEST['img']))	? $_REQUEST['img']	: NULL;

$gid = 'foo'.date('Ymd',strtotime($date));

if(isset($date)) {
	$fp = fsockopen("images.borbasmatyas.hu", 80, $errno, $errstr, 30);
	if (!$fp) {
		echo "$errstr ($errno)\n";
	} else {
		fwrite($fp, "GET /index.php?page=fishingonorfu.hu&v=inum&gid=".$gid." HTTP/1.0\r\nHost: images.borbasmatyas.hu\r\nUser-Agent: BM - Remote Gallery - HTTP/GET SQL DATA SOURCE\r\n\r\n");
		while(!feof($fp)) {
			$inum= @fgets($fp,128);
		}
		fclose($fp);
	}
	$fp = fsockopen("images.borbasmatyas.hu", 80, $errno, $errstr, 30);
	if (!$fp) {
		echo "$errstr ($errno)\n";
	} else {
		fwrite($fp, "GET /index.php?page=fishingonorfu.hu&v=title&gid=".$gid." HTTP/1.0\r\nHost: images.borbasmatyas.hu\r\nUser-Agent: BM - Remote Gallery - HTTP/GET SQL DATA SOURCE\r\n\r\n");
		while(!feof($fp)) {
			$title= @fgets($fp,128);
		}
		fclose($fp);
	}
}

$ii=($p*20)-(20-1);

define('BM_COPYRIGHT', 'Fot&oacute;: Borb&aacute;s M&aacute;ty&aacute;s www.borbasmatyas.hu');
define('TITLE', 'Fishing on Orf&#369;');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=iso-8859-2" />
		<meta http-equiv="Content-Style-Type" content="text/css" />

		<meta http-equiv="Content-Language" content="hu" />

		<meta http-equiv="imagetoolbar" content="no" />

		<meta name="description" content="Fishing On Orfû Fotógaléria" lang="hu" />

		<meta name="owner" content="Fishing on Orfû Kft." />
		<meta name="author" content="Borbás Mátyás - www.borbasmatyas.hu" />
		<meta name="copyright" content="Borbás Mátyás - All Rights Reserved" />
		<meta name="googlebot" content="index, follow, archive" />

		<link rel="stylesheet" type="text/css" media="all" title="normal"
		href="http://images.borbasmatyas.hu/?page=fishingonorfu.hu&gid=<?PHP print $gid; ?>&from=<?PHP print $ii;
			if (isset($img)) {
				print('&img='.$img);
			} else {
				print('&step=20;');
			}
		?>" />

		<title><?PHP 
			print TITLE;
			if(isset($day)) {
				print ' - ' . $title . ' (' . date('Y-m-d',strtotime($day)) .')';
			}
		?></title>

		<style type="text/css">
			<!--
				body {
					background-color:#000;
					margin:0 0 0 0;
					padding:0 0 0 0;
					font-family:Verdana, Geneva, sans-serif;
					font-size:10px;
					color:#FFF;
				}
				
				div#container {
					position:relative;
					margin:0 auto;
					width:900px;
					height:770px;
					background-color:#000000;
					background:url("/img/foo_logo.jpg");
					background-position:left top;
					background-repeat:no-repeat;
				}


				
				a img {
					border:none;
				}
				
				a {
					text-decoration:none;
				}
				
				div.content {
					position:absolute;
					left:55px;
					top:150px;
					width:780px;
					height:620px;
/*					border-top:#333 1px dotted;*/
					overflow:hidden;
					z-index:20;
				}
				table.show_img {
					position:relative;
					margin:0 auto;
					width:660px;
					height:440px;
				}

				a.back {
					position:absolute;
					left:0px;
					top:195px;
					width:21px;
					height:64px;
					background-image:url("./images/gal_back.gif");
					background-repeat:no-repeat;
					z-index:40;
				}
				a.back:hover {
					background-image:url("./images/gal_back_h.gif");
				}
				a.next {
					position:absolute;
					right:0px;
					top:195px;
					width:21px;
					height:64px;
					background-image:url("./images/gal_next.gif");
					background-repeat:no-repeat;
					z-index:40;
				}
				a.next:hover {
					background-image:url("./images/gal_next_h.gif");
				}
				
				table.thumb {
					position:absolute;
					width:125px;
					height:83px;
					border:#111 1px solid;
					visibility:hidden;
				}
				
				table#thumb_1 { left:39px; top:27px; }
				table#thumb_2 { left:183px; top:27px; }
				table#thumb_3 { left:328px; top:27px; }
				table#thumb_4 { left:472px; top:27px; }
				table#thumb_5 { left:616px; top:27px; }
				table#thumb_6 { left:39px; top:131px; }
				table#thumb_7 { left:183px; top:131px; }
				table#thumb_8 { left:328px; top:131px; }
				table#thumb_9 { left:472px; top:131px; }
				table#thumb_10 { left:616px; top:131px; }
				table#thumb_11 { left:39px; top:236px; }
				table#thumb_12 { left:183px; top:236px; }
				table#thumb_13 { left:328px; top:236px; }
				table#thumb_14 { left:472px; top:236px; }
				table#thumb_15 { left:616px; top:236px; }
				table#thumb_16 { left:39px; top:340px; }
				table#thumb_17 { left:183px; top:340px; }
				table#thumb_18 { left:328px; top:340px; }
				table#thumb_19 { left:472px; top:340px; }
				table#thumb_20 { left:616px; top:340px; }
				
				a img.thumb {
					display:block;
					border:#999 1px solid;
				}

				div.img a img.img {
					display:block;
					border:#999 1px solid;

				}
				
				div.img {
					position:relative;
				}
				
				div.watermark1 a {
					position:absolute;
					display:block;
					width:250px;
					height:12px;
					left:5px;
					bottom:5px;
					font-family:Verdana, Geneva, sans-serif;
					font-size:10px;
					text-align:left;
					color:#FFF;
					z-index:30;
				}
				div.watermark2 {
					position:absolute;
					width:250px;
					height:12px;
					left:4px;
					bottom:6px;
					font-family:Verdana, Geneva, sans-serif;
					font-size:10px;
					text-align:left;
					color:#000;
					z-index:29;
				}

				a.bm {
					position:absolute;
					right:90px;
					top:20px;
					width:220px;
					height:55px;
					background-image:url('/img/bm_logo.jpg');
					background-repeat:no-repeat;

					z-index:50;
				}

			-->
		</style>
	</head>
	<body>
	<script language="javascript" type="text/javascript">
		<!--
			
			function clickIE4(){
				if (event.button==2){
					//alert(message);
					return false;
				}
			}
			
			function clickNS4(e){
				if (document.layers||document.getElementById&&!document.all){
					if (e.which==2||e.which==3){
						//alert(message);
						return false;
					}
				}
			}
			
			if (document.layers){
				document.captureEvents(Event.MOUSEDOWN);
				document.onmousedown=clickNS4;
			} else if (document.all&&!document.getElementById){
				document.onmousedown=clickIE4;
			}
			
			document.oncontextmenu=new Function("return false")
			
		// --> 
	</script>

		<div id="container">
			<a href="http://www.borbasmatyas.hu/" class="bm">
				<img src="./images/gal_img.gif" width="190" height="70" />
			</a>
		
			<div id="background">
				
				<div id="gal_f1"><a href="/"><img src="/img/img.gif" width="355" height="145" /></a></div>
				<div id="gal_f2"></div>
			</div>
			<div class="content">

				<?PHP if(isset($img)) { ?>
				<!--Galéria / Kép-->
				<?PHP
				if($img>1) {
				?>
					<a href="./gallery.php?day=<?PHP print $_REQUEST['day']; ?>&p=<?PHP print $p; ?>&img=<?PHP print $img-1; ?>" class="back">
						<img src="./img/img.gif" width="21" height="64"  />
					</a>
				<?PHP
				}
				?>
				<table class="show_img" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center" valign="middle">
							<div class="img" id="img_<?PHP print $img; ?>">
								<a href="./gallery.php?day=<?PHP print $day; ?>&p=<?PHP print $p; ?>">
									<img src="./img/img.gif"
										class="img" />
								</a>
								<div class="watermark1"><a href="http://www.borbasmatyas.hu/"><?PHP print BM_COPYRIGHT; ?></a></div>
								<div class="watermark2"><?PHP print BM_COPYRIGHT; ?></div>
							</div>
						</td>
					</tr>
				</table>
				
				<?PHP
				if(($img+1)<$inum){
				?>
					<a href="./gallery.php?day=<?PHP print $_REQUEST['day']; ?>&p=<?PHP print $p; ?>&img=<?PHP print $img+1; ?>" class="next">
						<img src="./images/gal_img.gif" width="21" height="64"  />
					</a>
				<?PHP
				}
				?>

				<!--Galéria / Kép-->
				<?PHP } else { ?>
				<!--Galéria / Lista-->
				<?PHP
					if($p>1) {
				?>
					<a href="./gallery.php?day=<?PHP print $_REQUEST['day']; ?>&step=20&p=<?PHP print $p-1; ?>" class="back">
						Vissza<img src="./images/gal_img.gif" width="21" height="64" />
					</a>
				<?PHP
					}
					$i=1;
					
					while($i<=20) {
				?>
				<table id="thumb_<?PHP print $i; ?>" class="thumb" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center" valign="middle">
							<a href="./gallery.php?day=<?PHP print $date; ?>&p=<?PHP print $p; ?>&img=<?PHP print $ii; ?>">
								<img src="images/gal_img.gif" class="thumb" id="thumb_<?PHP print $i; ?>" />
							</a>
						</td>
					</tr>
				</table>
				<?PHP
						$i++;
						$ii++;
					}

					if(($inum-1)>=($p*20)){
				?>
				<a href="./gallery.php?day=<?PHP print $_REQUEST['day']; ?>&step=20&p=<?PHP print $p+1; ?>" class="next">
					Következõ<img src="./images/gal_img.gif" width="21" height="64" />
				</a>
				<?PHP } ?>
				<!--Galéria / Lista-->
				<?PHP } ?>
				
			</div>

		</div>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3492450-9");
pageTracker._trackPageview();
} catch(err) {}</script>
	</body>
</html>