<!DOCTYPE html>
<html lang="<?php echo I18n::lang() ?>">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="description" lang="hu" content="A Fishing on Orfű fesztivál teljes zenei archívuma a kezdetektől egészen 2018-ig. Jó böngészést, jó zenehallgatást kívánunk!">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<meta property="og:title" content="A nagy Fishing-archívum">
	<meta property="og:description" content="A Fishing on Orfű fesztivál teljes zenei archívuma a kezdetektől egészen 2018-ig. Jó böngészést, jó zenehallgatást kívánunk!">
	<meta property="og:image" content="<?php echo URL::site('media/images/2019/foo-archivum-og.jpg', 'http', false) ?>">
	<meta property="og:url" content="http://fishingonorfu.hu/archivum">
	<meta property="og:type" content="website">
	<meta property="fb:app_id" content="<?php echo Kohana::$config->load('facebook.app.id') ?>">
	<title>Fishing On Orfű archívum</title>
	<?php
	echo HTML::style('media/images/favicon.png', array('rel'=>'shortcut icon'))."\n\t";
	echo HTML::style_rev('media/css.2017/app.css')."\n\t";

	if(Kohana::$environment==Kohana::PRODUCTION) {echo View::factory("elemek/google-analytics")."\n\t";}
	?>
	<script>

		var initPlayers = function() {
			var div, n,
					v = document.getElementsByClassName("youtube-player");
			for (n = 0; n < v.length; n++) {
				div = document.createElement("div");
				div.setAttribute("data-id", v[n].dataset.id);
				div.setAttribute("class", "youtube-player-preview");
				div.innerHTML = labnolThumb(v[n].dataset.id);
				div.onclick = labnolIframe;
				v[n].appendChild(div);
			}
		}

		document.addEventListener("DOMContentLoaded", initPlayers);

		function labnolThumb(id) {
			var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
					play = '<div class="play"></div>';
			return thumb.replace("ID", id) + play;
		}

		function labnolIframe() {
			this.parentNode.parentNode.className+= " fullwidth";
			var iframe = document.createElement("iframe");
			var embed = "https://www.youtube.com/embed/ID?autoplay=1";
			iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
			iframe.setAttribute("class", "youtube-player-embed");
			iframe.setAttribute("frameborder", "0");
			iframe.setAttribute("allowfullscreen", "1");
			this.parentNode.appendChild(iframe, this);

		}

	</script>
</head>
<body class="<?php echo $aktiv_oldal ?>">
	<header class="archivum-header">
		<div class="container">
			<h1 class="archivum-header-logo">
				<?php echo HTML::anchor("/", HTML::image("media/images/2019/archivum-foo2019-logo.png?v2", array("alt"=>"Fishing On Orfű 2020"))) ?>
			</h1>

			<?php echo HTML::image("media/images/2020/archivum-header-title.png", array("alt"=>"11 év videói - a Fishing archívuma", "class"=>"img-responsive")) ?>

			<p>A Fishing on Orfű mindig is nagy figyelmet fordított a fesztivál koncertjeinek rögzítésére; fontos számunkra, hogy utólag is visszatekerhetőek legyenek az orfűi koncertélmények. A nagy Fishing-archívumban összegyűjtöttük a fesztivál összes hang- és videófelvételét, a kezdetektől egészen 2018-ig. Jó böngészést, jó zenehallgatást kívánunk mindenkinek!</p>

			<?php echo Form::open(null, array("class"=>"archivum-kereses-form")) ?>
				<?php echo Form::input("kereses", null, array("class"=>"archivum-kereses-input form-control input-lg", "placeholder"=>"Keress videókat!", "tabindex"=>1, "data-url"=>Route::url("archivum-keres", null, "http"))) ?>
				<svg id="archivum_kereses_loading" style="display: none;" width="50" height="50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-magnify"><path fill="none" class="bk" d="M0 0h100v100H0z"/><g><circle fill="rgba(80%,80%,80%,0.5)" cx="47" cy="47" r="20" opacity=".5"/><path d="M77.5 69.3l-6.2-6.2c-.7-.7-1.3-1.2-1.9-1.6 2.6-4 4.1-8.8 4.1-14 0-14.4-11.7-26.1-26.1-26.1S21.3 33.2 21.3 47.5 33 73.6 47.4 73.6c5.4 0 10.4-1.6 14.5-4.4.5.7 1.1 1.4 1.9 2.2l5.8 5.8c2.9 2.9 7.1 3.5 9.2 1.3 2.2-2.1 1.6-6.3-1.3-9.2zm-30.1-3.1c-10.3 0-18.7-8.4-18.7-18.6S37.1 29 47.4 29s18.7 8.4 18.7 18.6-8.4 18.6-18.7 18.6z" fill="#ccc"/><animateTransform attributeName="transform" type="translate" from="15 15" to="15 15" dur="1s" repeatCount="indefinite" values="15 15;-15 15;0 -10.98;15 15" keyTimes="0;0.33;0.66;1"/></g></svg>
				<div id="archivum_search_results">
				</div>
			<?php echo Form::close() ?>

			<div class="archivum-ev-linkek">
			<?php foreach($evek as $ev): ?>
				<a href="#ev-<?php echo $ev->id ?>"><?php echo $ev->id ?></a>
			<?php endforeach; ?>
			</div>
		</div>
	</header>

	<?php foreach($evek as $ev): ?>
		<section id="ev-<?php echo $ev->id ?>" class="archivum-ev ev-<?php echo $ev->id ?>">
			<div class="container">
				<header class="archivum-ev-header">
					<div class="archivum-ev-header-info">
						<?php echo HTML::image($ev->get_kep(), array("alt"=>"Fishing On Orfű ".$ev->id, "class"=>"archivum-logo")) ?>

						<h1 class="archivum-ev-title"><?php echo $ev->id ?></h1>

						<p class="archivum-ev-lead"><?php echo nl2br($ev->lead) ?></p>
					</div>
					<div class="archivum-ev-header-kiemelt">
						<?php
						$kiemelt_video = Arr::get($kiemelt_videok, $ev->id); //$ev->get_kiemelt_video();
						if($kiemelt_video instanceof Model_ArchivumVideo and $kiemelt_video->loaded()) {echo Youtube::embed($kiemelt_video->youtube_id);} ?>
					</div>
				</header>

				<div class="btn-row">
					<a class="btn btn-tovabbi-videok" role="button" data-toggle="collapse" href="#videok-<?php echo $ev->id ?>" aria-expanded="false" aria-controls="videok-<?php echo $ev->id ?>">További videók</a>
				</div>

				<div id="videok-<?php echo $ev->id ?>" class="archivum-tovabbi-videok collapse">
					<?php if($ev->has_szinpad()): ?>
						<ul class="nav nav-tabs" role="tablist">
							<?php foreach($ev->szinpad->latszik()->find_all() as $n=>$szinpad): ?>
							<li role="presentation" class="<?php echo $n==0 ? "active" : null ?>">
								<a href="#szinpad-<?php echo $szinpad->id ?>" aria-controls="home" role="tab" data-toggle="tab"><?php echo $szinpad->nev ?></a>
							</li>
							<?php endforeach ?>
						</ul>

						<div class="tab-content">
							<?php foreach($ev->szinpad->latszik()->find_all() as $n=>$szinpad): ?>
								<div role="tabpanel" class="tab-pane<?php if($n==0) echo " active" ?>" id="szinpad-<?php echo $szinpad->id ?>">
									<?php echo View::factory("archivum/videolista", array("videok"=>$szinpad->video->latszik()->find_all())); ?>
								</div>
							<?php endforeach ?>
						</div>
					<?php else: ?>
						<?php echo View::factory("archivum/videolista", array("videok"=>$ev->video->latszik()->find_all())); ?>
					<?php endif ?>
				</div>
			</div>
		</section>
	<?php endforeach ?>

	<footer class="archivum-footer">
		<div class="container">
			<div class="footer-social-media">
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
			<small>&copy; 2019 Fishing On Orfű</small>
		</div>
	</footer>

	<?php echo HTML::script_rev("media/js/all.min.js")."\n" ?>
</body>
</html>