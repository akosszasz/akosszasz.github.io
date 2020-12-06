<?php if (Session::instance()->get('figyelmeztet')): ?>
	<div class="alert alert-warning">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php echo Session::instance()->get_once('figyelmeztet'); ?>
	</div>
<?php endif; ?>