<!DOCTYPE html>
<html lang="<?php echo I18n::lang() ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" lang="hu" content="2018. június 20-21-22-23.">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta property="og:title" content="Fishing On Orfű 2018">
	<meta property="og:description" content="2018. június 20-21-22-23.">
	<meta property="og:image" content="http://fishingonorfu.hu/media/images/2018/foo2018-hamarosan-og.jpg">
	<meta property="og:url" content="http://fishingonorfu.hu">
	<meta property="og:type" content="website">
	<meta property="fb:app_id" content="1609144815837148">
	<title>Fishing On Orfű 2018</title>
	<?php /*<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> */ ?>
	<link rel="stylesheet" href="media/vendor/font-awesome/css/font-awesome.min.css">
	<?php echo HTML::style_rev('media/css/programfooldal.min.css'); ?>
	<?php
	echo HTML::style('media/images/favicon.png', array('rel'=>'shortcut icon'))."\n\t";

	if(Kohana::$environment==Kohana::PRODUCTION): ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
						(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-74774092-1', 'auto');
			ga('send', 'pageview');

		</script>
	<?php endif ?>
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<main class="main-content">
	<?php echo HTML::image("media/images/2018/foo2018-logo.png", array("class"=>"img-responsive center-block")) ?>

	<?php if(time()>mktime(15,0,0,12,6,2017)): ?>
	<div class="text-center">
		<h2 class="tmp-cim">Jegyértékesítés:</h2>

		<a href="https://www.ticketportal.hu/event.aspx?id=48662" target="_blank" rel="nofollow noreferrer" class="btn btn-danger btn-lg">Ticketportal</a>
		<a href="https://tixa.hu/fishingonorfu2018" target="_blank" rel="nofollow noreferrer" class="btn btn-danger btn-lg">Tixa <small>(csak SZÉP kártyás vásárlás)</small></a>
	</div>
	<?php endif ?>

	<br><br><br>

	<?php if($fellepok): ?>
	<div class="container">
		<div class="table-responsive" style="background: #fff;">
			<?php echo $fellepok ?>
		</div>
	</div>
	<?php endif ?>

	<div class="bubik text-center">
		<?php echo HTML::anchor("/archivum", HTML::image("media/images/2017/bubi-archivum.png", array("alt" => "Fishing On Orfű archívum - 10 év videói")), array("class"=>"bubi-archivum")) ?>
		<?php echo HTML::anchor("/foo-klub", HTML::image("media/images/2017/bubi-fooklub.png", array("alt" => "FOO Klub")), array("class"=>"bubi-fooklub")) ?>
	</div>

	<div class="text-center">
		<a href="http://facebook.com/fishingonorfu" target="_blank" rel="nofollow noreferrer">
			<i class="fa fa-facebook-official" aria-hidden="true"></i>
			<span class="sr-only">Fishing On Orfű a Facebookon</span>
		</a>
		<a href="http://instagram.com/fishingonorfu" target="_blank" rel="nofollow noreferrer">
			<i class="fa fa-instagram" aria-hidden="true"></i>
			<span class="sr-only">Fishing On Orfű Instagram</span>
		</a>
		<a href="http://youtube.com/user/FishingOnOrfuFeszt" target="_blank" rel="nofollow noreferrer">
			<i class="fa fa-youtube" aria-hidden="true"></i>
			<span class="sr-only">Fishing On Orfű YouTube csatornája</span>
		</a>
	</div>

</main>

</body>
</html>