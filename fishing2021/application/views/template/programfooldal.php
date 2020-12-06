<!DOCTYPE html>
<html lang="<?php echo I18n::lang() ?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" lang="hu" content="2017. június 20-21-22-23-24.">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta name="og:title" content="Fishing On Orfű 2017">
	<meta name="og:description" content="2017. június 20-21-22-23-24.">
	<meta name="og:image" content="<?php echo Kohana::$base_url ?>media/images/foo-2017-og.jpg">
	<title>Fishing On Orfű 2017</title>
	<?php
	echo HTML::style('media/images/favicon.png', array('rel'=>'shortcut icon'))."\n\t";
	echo HTML::style_rev('media/css.2017/app-programfooldal.css')."\n\t";

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
	<header>
		<?php echo HTML::image("media/images/programfooldal/foo-2017-logo.png", array("alt" => "Fishing On Orfű 2017", "class"=>"header-logo img-responsive")) ?>
	</header>

	<section>
		<header>
			<h1 class="header-title">Jegyvásárlás</h1>
		</header>

		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center">
					<a href="https://www.ticketportal.hu/event.aspx?id=48111" class="jegy-link" target="_blank" rel="nofollow noreferrer">Ticketportal</a>
				</div>
				<div class="col-sm-6 text-center">
					<a href="https://tixa.hu/fishingonorfu2017" class="jegy-link" target="_blank" rel="nofollow noreferrer">Tixa<small>(SZÉP kártyás vásárlás)</small></a>
				</div>
			</div>
		</div>
	</section>

	<article>
		<header>
			<h1 class="header-title">Program</h1>
		</header>

		<div class="container article-container">
			<?php
			echo $program->szoveg;
			if(time()>mktime(19,0,0,3,8,2017)) echo $tuzhozkozel->szoveg;
			if(time()>mktime(19,0,0,3,1,2017)) echo $viziszinpad->szoveg;
			?>
		</div>
	</article>
</body>
</html>