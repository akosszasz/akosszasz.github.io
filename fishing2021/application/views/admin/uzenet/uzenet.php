<?php if (Session::instance()->get('uzenet')): ?>
	<div class="alert alert-success">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<p><?php echo Session::instance()->get_once('uzenet'); ?></p>
	</div>
<?php endif; ?>