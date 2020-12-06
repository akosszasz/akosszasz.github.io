<!DOCTYPE html>
<html lang="<?php echo I18n::lang() ?>">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta property="og:description" content="">
	<meta property="og:title" content="Fishing On Orfű 2020 <?php echo $title ? "- ".$title : null ?>">
	<meta property="og:image" content="<?php echo URL::site('media/images/2020/foo2020-og.jpg', 'http', false) ?>">
	<meta property="og:url" content="http://fishingonorfu.hu">
	<meta property="og:type" content="website">
	<meta property="fb:app_id" content="1609144815837148">
	<title><?php echo $title ? $title." - " : null ?>Fishing On Orfű 2020</title>
	<?php
	echo HTML::style('media/images/2020/favicon.png', array('rel'=>'shortcut icon'))."\n\t";
	echo HTML::style_rev('media/css/app.min.css')."\n\t";

	if(Kohana::$environment==Kohana::PRODUCTION) {echo View::factory("elemek/google-analytics")."\n\t";}
	?>
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
	<script>
		window.addEventListener("load", function(){
			window.cookieconsent.initialise({
				"palette": {
					"popup": {
						"background": "#eee"
					},
					"button": {
						"background": "#d6602b"
					}
				},
				"content": {
					"message": "A weboldalon cookie-kat használunk a lehető legjobb felhasználói élmény biztosítása érdekében",
					"dismiss": "Értem",
					"link": "További információ",
					"href": "/info/adatvedelem"
				}
			})});
	</script>
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	 fbq('init', '1063854343753806'); 
	fbq('track', 'PageView');
	</script>
	<noscript>
	 <img height="1" width="1" 
	src="https://www.facebook.com/tr?id=1063854343753806&ev=PageView
	&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	<!-- Global site tag (gtag.js) - Google Ads: 855305595 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-855305595"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

	  	gtag('config', 'AW-855305595');
	</script>
</head>
<body class="<?php echo $aktiv_oldal ?> <?php echo str_replace(array(" ","á","é","í","ó","ö","ő","ú","ü","ű"), array("-","a","e","i","o","o","o","u","u","u"), strtolower($title));?>">
	<header class="header">
		<nav class="header-nav flex-column flex-row-md flex-wrap-md flex-align-center-md wow fadeIn">
			<div class="header-logo">
			<?php echo HTML::anchor(
					'/'.(I18n::lang()=='hu'?null:I18n::lang()),
					HTML::image(
							'media/images/2020/foo2020-logo.png',
							array('alt'=>'Fishing On Orfű 2020','class'=>'header-logo-img')
					),
					array('class'=>'header-logo-link')
			) ?>
			</div>

			<?php
			$fomenu = array(
				/*'fellepok' => 'Fellépők',
				'jegyek' => 'Jegyek',
				'hirek' => 'Hírek',
				'nemzene' => 'Nemzene',
				'gasztro' => 'Gasztro',
				'info' => 'Info',
				'tamogatok' => 'Támogatók',*/
			);
			?>
			<ul class="header-menu flex-column flex-row-md flex-grow-1-md list-unstyled">
				<?php foreach($fomenu as $url=>$title): ?>
					<li class="header-menupont font-heading font-24<?php echo ($url==Request::current()->uri() or (isset($aktiv_menupont) and $aktiv_menupont == $url)) ? ' active' : null ?>">
						<?php echo HTML::anchor(((I18n::lang()!='hu' and $url!='hu') ? I18n::lang() : null) . '/'.__($url), $title, array('class'=>'header-menupont-link inverz')) ?>
					</li>
				<?php endforeach; ?>
			</ul>

			<div class="header-linkek flex-column flex-row-sm flex-justify-end">
				<a href="<?php echo URL::site('/archivum', null, Kohana::$environment!=Kohana::PRODUCTION) ?>" class="header-link flex flex-align-center">
					<?php echo HTML::image('media/images/2020/header-link-archivum.png', array('alt'=>'FOO Archívum')) ?>
					<span>Videoarchívum <br>12 év videói</span>
				</a>
				<a href="<?php echo URL::site('/foo-klub', null, Kohana::$environment!=Kohana::PRODUCTION) ?>" class="header-link flex flex-align-center">
					<?php echo HTML::image('media/images/2020/header-link-fooklub.png', array('alt'=>'FOO Klub')) ?>
					<span>FOO Klub</span>
				</a>
			</div>
		</nav>

		<svg class="header-nav-toggle text-right hidden-md hidden-lg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="27" height="27">
			<line class="line-close" x1="15" y1="15" x2="85" y2="85" stroke-linecap="round"/>
			<line class="line-close" x1="15" y1="85" x2="85" y2="15" stroke-linecap="round"/>
			<line class="line-open" x1="5" y1="15" x2="95" y2="15" stroke-linecap="round"/>
			<line class="line-open" x1="5" y1="50" x2="95" y2="50" stroke-linecap="round"/>
			<line class="line-open" x1="5" y1="85" x2="95" y2="85" stroke-linecap="round"/>
		</svg>

		<?php /*if($aktiv_oldal=='fooldal'): ?>

			<?php <div class="header-cuccok flex flex-justify-center">
				<?php echo HTML::image('media/images/2018/cuccok-tmp.png') ?>
			</div>  ?>

			<div class="fooldal-headliners flex flex-wrap flex-justify-center wow fadeIn">
				<?php foreach($lista as $n=>$item):
					$bg = array(
						0 => 'media/images/2018/label-bg-piros.png',
						1 => 'media/images/2018/label-bg-sarga.png',
						2 => 'media/images/2018/label-bg-zold.png',
					)
					?>
					<div class="fooldal-headliner"><?php echo $item->headline ?></div>
				<?php endforeach; ?>
			</div>

			<div class="text-center">
				<?php echo HTML::anchor("/fellepok", "Összes program", array("class"=>"fooldal-headliners-link")) ?>
			</div>

		<?php else: ?>

			<div class="header-cuccok flex flex-justify-center">
				<?php echo HTML::image('media/images/2020/cuccok-aloldal-tmp.png') ?>
			</div>

			<h1 class="header-hl"><?php echo HTML::image('media/images/2020/hl-'.$aktiv_oldal.'.png', array('alt'=>$title,'class'=>'header-hl-image')) ?></h1>
		<?php endif ?>

		<?php if($aktiv_oldal=='fooldal' and isset($slider)): ?>
			<?php foreach($slider as $n=>$slide): ?>
				<div class="header-bg-img <?php echo ($n==0 ? ' active' : null) ?>" style="background-image: url(<?php echo URL::site($slide->get_kep(), 'http', false) ?>) "></div>
			<?php endforeach ?>
		<?php endif; */?>
	</header>

	<main class="main-content">
		<?php
		if (Session::instance()->get('errors')){ echo View::factory('uzenetek/errors'); }
		if (Session::instance()->get('uzenet')){ echo View::factory('uzenetek/uzenet'); }

		echo $tartalom;
		?>
	</main>

	<footer class="footer flex flex-align-end">
		<div class="container-flex flex-column flex-row-sm flex-justify-between-sm flex-align-center">
			<div class="footer-sm flex-basis-33p-md">
				<div class="footer-sm-cont">
					<a href="http://facebook.com/fishingonorfu" target="_blank" rel="nofollow noreferrer" class="footer-sm-link">
						<?php echo HTML::image('media/images/2020/ikon-facebook.png', array('alt' => 'Facebook')) ?>
					</a>
					<a href="http://instagram.com/fishingonorfu" target="_blank" rel="nofollow noreferrer" class="footer-sm-link">
						<?php echo HTML::image('media/images/2020/ikon-instagram.png', array('alt' => 'Instagram')) ?>
					</a>
					<a href="http://youtube.com/user/FishingOnOrfuFeszt" target="_blank" rel="nofollow noreferrer" class="footer-sm-link">
						<?php echo HTML::image('media/images/2020/ikon-youtube.png', array('alt' => 'Youtube')) ?>
					</a>
				</div>
				<div class="footer-sm-links">
					<?php echo HTML::anchor('/sajto', 'Sajtó', array('class'=>'bold text-uppercase text-white footer-link')) ?>
					<?php echo HTML::anchor('/kontakt', 'Kontakt', array('class'=>'bold text-uppercase text-white footer-link')) ?>
					<?php echo HTML::anchor('/info/adatvedelem', 'Adatvédelem', array('class'=>'bold text-uppercase text-white footer-link')) ?>
					<?php echo HTML::anchor('/info/aszf', 'ÁSZF', array('class'=>'bold text-uppercase text-white footer-link')) ?>
				</div>
			</div>
			<div class="footer-logo flex-basis-33p-md flex flex-justify-center">
				<?php echo HTML::anchor(
						'/'.(I18n::lang()=='hu'?null:I18n::lang()),
						HTML::image(
								'media/images/2020/foo2020-footer-logo.png',
								array('alt'=>'Fishing On Orfű 2020','class'=>'footer-logo-img')
						),
						array('class'=>'footer-logo-link')
				) ?>
			</div>
			<div class="text-white text-uppercase flex-basis-33p-md flex flex-justify-end">&copy; <?php echo date("Y") ?> Fishing On Orfű</div>
		</div>
	</footer>

	<?php echo HTML::script_rev("media/js/all.min.js") ?>
	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

	    <!-- Background of PhotoSwipe. 
	         It's a separate element, as animating opacity is faster than rgba(). -->
	    <div class="pswp__bg"></div>

	    <!-- Slides wrapper with overflow:hidden. -->
	    <div class="pswp__scroll-wrap">

	        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
	        <div class="pswp__container">
	            <!-- don't modify these 3 pswp__item elements, data is added later on -->
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	            <div class="pswp__item"></div>
	        </div>

	        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
	        <div class="pswp__ui pswp__ui--hidden">

	            <div class="pswp__top-bar">

	                <!--  Controls are self-explanatory. Order can be changed. -->

	                <div class="pswp__counter"></div>

	                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

	                <button class="pswp__button pswp__button--share" title="Share"></button>

	                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

	                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

	                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
	                <!-- element will get class pswp__preloader--active when preloader is running -->
	                <div class="pswp__preloader">
	                    <div class="pswp__preloader__icn">
	                      <div class="pswp__preloader__cut">
	                        <div class="pswp__preloader__donut"></div>
	                      </div>
	                    </div>
	                </div>
	            </div>

	            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
	                <div class="pswp__share-tooltip"></div> 
	            </div>

	            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
	            </button>

	            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
	            </button>

	            <div class="pswp__caption">
	                <div class="pswp__caption__center"></div>
	            </div>

	          </div>

	        </div>

	</div>
</body>
</html>