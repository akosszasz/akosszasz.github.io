<?php if (Session::instance()->get('errors')): ?>
	<?php $errors = Session::instance()->get_once('errors'); ?>
	<div class="alert alert-error">
		<a class="close">&times;</a>
		<?php if (is_array($errors)): ?>
			<ul>
			<?php foreach ($errors as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
			</ul>
		<?php else: ?>
			<?php echo $errors; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>

<?php if (Session::instance()->get('uzenet')): ?>
	<div class="alert alert-success">
		<a class="close">&times;</a>
		<?php echo Session::instance()->get_once('uzenet'); ?>
	</div>
<?php endif; ?>

<?php if (Session::instance()->get('figyelmeztet')): ?>
	<div class="alert alert-warning">
		<a class="close">&times;</a>
		<?php echo Session::instance()->get_once('figyelmeztet'); ?>
	</div>
<?php endif; ?>