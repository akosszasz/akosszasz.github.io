<!DOCTYPE html>
<html lang="hu">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" content="2019. június 19-20-21-22.">
	<meta property="og:description" content="Fishing on Orfű 2019 - ELINDULT A JEGYÉRTÉKESÍTÉS!">
	<meta property="og:title" content="Fishing On Orfű 2019">
	<meta property="og:image" content="http://www.fishingonorfu.hu/media/images/2019/foo2019-og.jpg">
	<meta property="og:url" content="http://fishingonorfu.hu">
	<meta property="og:type" content="website">
	<meta property="fb:app_id" content="1609144815837148">
	<title>Fishing On Orfű 2019</title>
	<link type="text/css" href="/media/images/2019/favicon.png" rel="shortcut icon" />
	<link type="text/css" href="/media/css/foo-2019-landing.css?v=0.3" rel="stylesheet" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-74774092-1"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

	  	gtag('config', 'UA-74774092-1');
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
		<img height="1" width="1" src="https://www.facebook.com/tr?id=1063854343753806&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
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
						"background": "#ed4e4a"
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
</head>
<body class="vbox">
	<header>
		<div class="header-links flex-column flex-row-sm position-absolute">
			<a href="/archivum" class="header-link flex flex-align-center" target="_blank">
				<img src="/media/images/2019/header-link-archivum.png" alt="FOO Archívum">
				<span>Videoarchívum <br>10 év videói</span>
			</a>
			<a href="/foo-klub" class="header-link flex flex-align-center" target="_blank">
				<img src="/media/images/2019/header-link-fooklub.png" alt="FOO Klub">
				<span>FOO Klub</span>
			</a>
		</div>
	</header>
	    <section class="main hbox space-between">
		    <article>
		        <img src="/media/images/2019/foo2019-landing.png" alt="" width="768" height="543" class="img-fluid mx-auto"><br>
		        <a href="https://tixa.hu/fishingonorfu2019" target="_blank" class="text-uppercase">Jegyvásárlás</a>
		    </article>
	    </section>
	<section class="fellepok">
		<?php if($fellepok): ?>
		<div class="container">
			<div class="table-responsive" style="background: #fff;">
				<?php echo $fellepok ?>
			</div>
		</div>
		<?php endif ?>
	</section>
	<div>
		<p class="text-center" style="padding-top: 10px;color:#fff;">
			<small>A műsorváltozás jogát fenntartjuk.</small>
		</p>
	</div>
    <footer>
    	<div class="footer-sm-links">
		   	<a href="http://facebook.com/fishingonorfu" target="_blank" rel="nofollow noreferrer">
				<img src="/media/images/2019/ikon-facebook.png" alt="Facebook">
			</a>
			<a href="http://instagram.com/fishingonorfu" target="_blank" rel="nofollow noreferrer">
				<img src="/media/images/2019/ikon-instagram.png" alt="Instagram">
			</a>
			<a href="http://youtube.com/user/FishingOnOrfuFeszt" target="_blank" rel="nofollow noreferrer">
				<img src="/media/images/2019/ikon-youtube.png" alt="Youtube">
			</a>
			<span><a href="/info/hazirend">Házirend</a> | &copy; 2019 FISHING ON ORFŰ</span>
		</div>
    </footer>
    <div class="fellepo-popup">
    	<div>
    		<a href="#" class="close-popup">×</a>
    		<div class="iframe"></div>
    		<p></p>
    	</div>
    	
    </div>
    <script type="text/javascript" src="/media/js/all-7cf65a8bcd.min.js"></script>
    <script>
    	$(function(){
    		$('table').find('tr').find('td').on('click', function(e){
    			var cellindex = e.target.cellIndex - 1;
    			var cell = $(this).parents('tr').next('.programtabla-youtube').find('td:eq('+cellindex+')');
    			if($.trim(cell.html()).length == 11){
    				yt = $(this).parents('tr').next('.programtabla-youtube').find('td:eq('+cellindex+')').html();
    				text = $(this).parents('tr').next().next('.programtabla-leiras').find('td:eq('+cellindex+')').html();

    				$('.fellepo-popup').find('.iframe').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/'+yt+'?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
    				$('.fellepo-popup').css({opacity:1,height:"100%",width:"100%"});
    				$('.fellepo-popup').find('p').html(text);
    			}
    		});

    		$('.close-popup').on('click', function(e){
    			e.preventDefault();
    			$('.fellepo-popup').css({opacity:0,height:0,width:0});
    			$('.fellepo-popup').find('.iframe').html('');
    		});

    		$(document).keyup(function(e) {
			     if (e.key === "Escape" || e.keyCode === 27){
			        $('.fellepo-popup').css({opacity:0,height:0,width:0});
    				$('.fellepo-popup').find('.iframe').html('');
			    }
			});
    	});
    </script>
</body>
</html>