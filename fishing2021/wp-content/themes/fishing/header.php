<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fishing on Orfű</title>
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon-16x16.png">

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
	
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<!--[if lt IE 9]>
    	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>

	<div class="page-container">

		<header class="header">

			<div class="trigger-wrapper">
				<button class="nav-trigger">Menü</button>
			</div>

			<div class="inner-wrapper">
				
				<nav role="navigation">
					<!--<ul class="header__menu nostyle">
						<li><a href="#">Friss</a></li>
						<li><a href="#">Program</a></li>
						<li><a href="#">Jegy</a></li>
						<li><a href="#">Info</a></li>
						<li><a href="#">Sajtó</a></li>
						<li><a href="#">Támogatók</a></li>
					</ul>-->
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'header__menu' ) ); ?>
				</nav>

				<ul class="social nostyle">
					<li><a href="https://www.facebook.com/fishingonorfu" class="icon i-fb" target="_blank">Facebook</a></li>
					<li><a href="http://instagram.com/fishingonorfu" class="icon i-ins" target="_blank">Instagram</a></li>
					<li><a href="https://twitter.com/fishingonorfu12" class="icon i-twt" target="_blank">Twitter</a></li>
					<li><a href="https://www.youtube.com/user/FishingOnOrfuFeszt" class="icon i-yt" target="_blank">YouTube</a></li>
				</ul>

				<a href="/" class="logo">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/fishing_logo.png" alt="Fishing on Orfű">
				</a>

			</div>

		</header>