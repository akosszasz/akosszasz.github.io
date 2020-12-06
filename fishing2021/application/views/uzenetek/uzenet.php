<?php if (Session::instance()->get('uzenet')){$uzenet = Session::instance()->get_once('uzenet');}
if (!isset($uzenet) and Session::instance()->get('message')){$uzenet = Session::instance()->get_once('message');} ?>
<?php if (isset($uzenet)){ ?>
	<div class="container">
		<div class="alert alert-success">
			<span class="close" data-dismiss="alert" aria-hidden="true">&times;</span>
			<p><?php echo $uzenet; ?></p>
		</div>
	</div>
<?php } ?>