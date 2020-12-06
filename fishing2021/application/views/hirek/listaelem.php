<article class="hirek-listaelem listaelem">
	<div class="hirek-listaelem-content listaelem-content">
		<time class="hirek-listaelem-datum"><?php echo strftime("%Y.%m.%d", strtotime($hir->datum)) ?></time>
		<h2 class="hirek-listaelem-cim">
			<a href="<?php echo URL::site($hir->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>" class="inverz">
				<?php echo $hir->forditva()->cim ?>
			</a>
		</h2>

		<?php if($hir->get_kep()): ?>
		<a href="<?php echo URL::site($hir->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>">
			<?php echo HTML::image($hir->get_kep(), array("alt"=>htmlspecialchars($hir->forditva()->cim), "class"=>"img-responsive hirek-listaelem-img")) ?>
		</a>
		<?php endif ?>

		<div class="hirek-listaelem-lead">
			<?php echo $hir->forditva()->lead ?>
			<?php echo HTML::anchor($hir->get_link(), 'Tovább', array('class'=>'btn btn-xs btn-danger')) ?>
		</div>

		<hr>
	</div>
</article>
