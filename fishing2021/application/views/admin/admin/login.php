<div class="container">
	<div class="col-md-4 col-md-offset-4">
		<div class="clearfix">
			<?php echo HTML::image("media/images/2020/foo2020-logo.png", array("class"=>"center-block", "style"=>"width: 300px;")) ?>
		</div>
		<br>
		<div class="panel panel-default">
			<div class="panel-heading"><h3 class="panel-title text-center"><strong><?php echo __('Bejelentkezés'); ?></strong></h3></div>
			<div class="panel-body">
				<form role="form" action="" method="POST" accept-charset="utf-8" class="urlap">
					<div class="form-group">
						<label for="felhasznalo"><?php echo __('Felhasználónév'); ?></label>
						<input type="text" name="username" class="form-control" id="felhasznalo">
					</div>
					<div class="form-group">
						<label for="jelszo"><?php echo __('Jelszó'); ?></label>
						<input type="password" name="password" value="" class="form-control" id="jelszo">
					</div>
					<div class="form-group text-center">
						<input type="submit" value="<?php echo __('Belépés'); ?>" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>