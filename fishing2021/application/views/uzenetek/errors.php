<?php if (Session::instance()->get('errors')){$errors = Session::instance()->get_once('errors');} ?>
<?php if (isset($errors) && count($errors)>0){ ?>
	<div class="container">
		<div class="alert alert-danger">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?php if ( ! is_string($errors)){ ?>
				<ul class="list-unstyled">
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
	</div>
<?php } ?>