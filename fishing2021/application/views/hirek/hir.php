<section class="container">
	<div class="row">
		<article class="col-sm-8 hir">
			<time class="hirek-listaelem-datum"><?php echo strftime("%Y.%m.%d", strtotime($hir->datum)) ?></time>
			<h2 class="hir-cim">
				<a href="<?php echo URL::site($hir->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>" class="inverz">
					<?php echo $hir->forditva()->cim ?>
				</a>
			</h2>

			<?php if($hir->get_kep()): ?>
				<picture>
					<?php echo HTML::image($hir->get_kep()?$hir->get_kep():'http://placehold.it/1200x680', array("alt"=>htmlspecialchars($hir->forditva()->cim), "class"=>"img-responsive hirek-listaelem-img")) ?>
				</picture>
			<?php endif ?>

			<div class="hir-lead">
				<?php echo $hir->forditva()->lead ?>
			</div>

			<div class="cikk">
				<?php echo $hir->forditva()->szoveg ?>
			</div>
		</article>
		<aside class="col-sm-4">
			<?php foreach($hirek as $n=>$hir):
				echo View::factory('hirek/listaelem', array('hir'=>$hir, 'n'=>$n)).'<br>';
			endforeach;  ?>

			<div class="text-center">
				<?php echo HTML::anchor('/hirek', 'Összes hír', array('class'=>'btn btn-danger')) ?>
			</div>
		</aside>
	</div>
</section>