<?php $errors = Session::instance()->get_once('errors'); ?>
<?php if (count($errors)>0){ ?>
	<div class="alert alert-danger">
		<a class="close" data-dismiss="alert" href="#">&times;</a>
		<?php if ( ! is_string($errors)){ ?>
			<ul>
				<?php foreach ($errors as $key => $error): ?>
					<?php if ($key=="_external"): ?>
						<?php foreach ($error as $key2 => $err): ?>
							<li><?php echo $err; ?></li>
						<?php endforeach ?>
					<?php else: ?>
						<li><?php echo $error; ?></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		<?php }else{ ?>
			<p><?php echo $errors; ?></p>
		<?php } ?>
	</div>
<?php } ?>