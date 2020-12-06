<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>
	<?php if(is_array($message)): ?>
		<ul class="list-unstyled">
			<?php foreach($message as $msg): ?>
				<li><?php echo $msg ?></li>
			<?php endforeach ?>
		</ul>
	<?php else: ?>
		<p><?php echo $message; ?></p>
	<?php endif ?>
</div>