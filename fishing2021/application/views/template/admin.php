<!doctype html>
<html lang="hu">
	<head>
		<meta charset="utf-8">
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Fishing On Orfű 2020 admin</title>

		<?php
		echo HTML::style('media/images/favicon.png', array('rel'=>'shortcut icon'))."\n\t";
		echo HTML::style('media/vendor/bootstrap/dist/css/bootstrap.min.css')."\n\t";
		echo HTML::style('media/vendor/jquery-ui/css/custom-theme/jquery-ui-1.10.0.custom.css')."\n\t";
		echo HTML::style('media/vendor/jcrop/css/jquery.Jcrop.css')."\n\t";
		echo HTML::style('media/vendor/fileuploader/fileuploader.css')."\n\t";
		echo HTML::style('media/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')."\n\t";
		echo HTML::style('media/vendor/bootstrap-datetimepicker-bovitett/css/bootstrap-datetimepicker.min.css')."\n\t";
		echo HTML::style('media/admin/css/master.css')."\n\t";

		echo HTML::script('media/vendor/jquery/dist/jquery.min.js');
		echo HTML::script('media/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.min.js');
		echo HTML::script('media/vendor/nestable/jquery.nestable.js');
		echo HTML::script('media/vendor/jcrop/js/jquery.Jcrop.min.js');
		echo HTML::script('media/vendor/bootstrap/dist/js/bootstrap.min.js');
		//echo HTML::script('media/vendor/bootstrap3-typeahead/bootstrap3-typeahead.js');
		echo HTML::script('media/admin/ckeditor4/ckeditor.js');
		echo HTML::script('media/vendor/fileuploader/fileuploader.js');
		echo HTML::script('media/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js');
		echo HTML::script('media/vendor/bootstrap-datetimepicker-bovitett/js/bootstrap-datetimepicker.min.js');
		echo HTML::script('media/admin/js/init.js');
		?>

		<script>document.base_url = '<?php echo (Kohana::$base_url=="/" ? "" : Kohana::$base_url) ?>';</script>
	</head>
	<body<?php if(isset($aktiv_oldal)) echo ' class="'.$aktiv_oldal.'"'; /*if(Kohana::$environment==Kohana::TESTING)*/ echo ' data-ckroot="'.substr(Kohana::$base_url, 0, strlen(Kohana::$base_url)-1).'"' ?>>
		<?php $admin = Auth::instance()->get_user(); ?>
		<?php if ($admin && $admin->has('roles', ORM::factory('Role', array('name' => 'admin')))): ?>
			<header>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
								<span class="sr-only">Menü</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<span class="navbar-brand" style="padding-top: 0; padding-left: 0;">
								<?php echo HTML::image("media/images/2020/foo2020-logo.png", array("style"=>"width: 100px")) ?>
							</span>
						</div>

						<div class="collapse navbar-collapse" id="navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li><?php echo HTML::anchor("/admin/fooldal", "Főoldal") ?></li>
								<li><?php echo HTML::anchor("/admin/hirek", "Hírek") ?></li>
								<li><?php echo HTML::anchor("/admin/szoveg", "Szövegek") ?></li>
								<li><?php echo HTML::anchor("/admin/slider", "Slider") ?></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Jegyek <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?php echo HTML::anchor("/admin/jegy", "Jegyek") ?></li>
										<li><?php echo HTML::anchor("/admin/jegytipus", "Jegytípusok") ?></li>
									</ul>
								</li>
								<li><?php echo HTML::anchor("/admin/offprogram", "Nemzene") ?></li>
								<li><?php echo HTML::anchor("/admin/kulsoprogram", "Külső programok") ?></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sajtó <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><?php echo HTML::anchor("/admin/sajtoakkreditacio", "Sajtóakkreditáció") ?></li>
										<li><?php echo HTML::anchor("/admin/sajtokozlemeny", "Sajtóközlemények") ?></li>
										<li><?php echo HTML::anchor("/admin/sajtofoto", "Sajtófotók") ?></li>
									</ul>
								</li>
								<li><?php echo HTML::anchor("/admin/tamogato", "Támogatók") ?></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="text-primary">Archívum <b class="caret"></b></span></a>
									<ul class="dropdown-menu">
										<li><?php echo HTML::anchor("/admin/archivum/ev", "Év") ?></li>
										<li><?php echo HTML::anchor("/admin/archivum/szinpad", "Színpad") ?></li>
										<li><?php echo HTML::anchor("/admin/archivum/video", "Videók") ?></li>
									</ul>
								</li>
								<li><?php echo HTML::anchor("/admin/kepfeltoltes", "Képfeltöltés") ?></li>
							</ul>
							<div class="navbar-right">
								<?php echo HTML::anchor("/admin/admin/kilepes", '<span class="glyphicon glyphicon-log-out"></span>', array("class"=>"navbar-btn btn")) ?>
							</div>
						</div>
					</div>
				</nav>
			</header>
		<?php endif; ?>
		<div id="container" class="container">
			<div id="main" role="main">
				<?php
				if (Session::instance()->get('errors')) {
					echo View::factory('admin/uzenet/error');
				}
				?>
				<?php
				if (Session::instance()->get('uzenet')) {
					echo View::factory('admin/uzenet/uzenet');
				}
				?>
				<?php
				if (Session::instance()->get('figyelmeztet')) {
					echo View::factory('admin/uzenet/figyelmeztet');
				}
				?>
				
				<div class="page-header" style="margin-top: 0">
					<h1><?php echo $title; ?></h1>
				</div>

				<?php echo $tartalom ?>
			</div>
			<footer>

			</footer>
		</div>
	</body>
</html>
