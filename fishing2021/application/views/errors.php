<?php if (isset($errors)): ?>
	<ul class="error">
		<?php foreach ($errors as $key => $error): ?>
			<?php if ( ! is_array($error)): ?>
				<li><?php echo $error ?></li>
			<?php else: ?>
				<?php foreach ($error as $key => $error2): ?>
					<li><?php echo $error2 ?></li>
				<?php endforeach ?>
			<?php endif ?>
		<?php endforeach ?>
	</ul>
<?php endif ?>