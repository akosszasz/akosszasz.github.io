<nav class="aloldal-menu container" id="top">
	<ul class="nav nav-tabs">
		<?php foreach($aloldal_menu as $url => $menu): ?>
			<li class="<?php echo $url==$aktiv_almenu?"active":null ?>">
				<?php echo HTML::anchor($url, $menu) ?>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>