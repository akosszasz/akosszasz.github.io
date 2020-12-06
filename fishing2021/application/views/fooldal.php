<section class="container hirek-lista">
	<header>
		<h1 class="section-cim text-cyan">Hírek</h1>
	</header>
	<div class="row">
		<?php foreach($hirek as $hir): ?>
			<div class="col-sm-4">
				<div class="hirek-listaelem">
					<time class="hirek-listaelem-datum"><?php echo strftime("%Y.%m.%d", strtotime($hir->datum)) ?></time>
					<h2 class="hirek-listaelem-cim">
						<a href="<?php echo URL::site($hir->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>" class="inverz">
							<?php echo $hir->forditva()->cim ?>
						</a>
					</h2>

					<?php if($hir->get_kep()): ?>
					<a href="<?php echo URL::site($hir->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>">
						<?php echo HTML::image($hir->get_kep()?$hir->get_kep():'http://placehold.it/1200x680', array("alt"=>htmlspecialchars($hir->forditva()->cim), "class"=>"img-responsive hirek-listaelem-img")) ?>
					</a>
					<?php endif ?>

					<div class="hirek-listaelem-lead">
						<?php echo $hir->forditva()->lead ?>
						<?php echo HTML::anchor($hir->get_link(), 'Tovább', array('class'=>'btn btn-xs btn-danger')) ?>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>

	<?php echo HTML::anchor('/hirek', 'Tovább az összes hírre', array("class"=>"tovabb-link")) ?>
</section>

<!--<section class="fooldal-nemzene">
	<header>
		<h1 class="section-cim text-white">Nemzene</h1>
	</header>
	<div class="container">
		<div class="row">
			<?php foreach($nemzene as $cikk): ?>
				<div class="col-sm-4 nemzene-listaelem">
					<div class="flex">
						<?php if($cikk->datum_tol>0): ?>
						<time class="nemzene-listaelem-datum" datetime="<?php echo $cikk->datum_tol ?>">
							<span class="m"><?php echo strftime("%B", strtotime($cikk->datum_tol)) ?></span>
							<span class="d"><?php echo strftime("%d", strtotime($cikk->datum_tol)) ?></span>
							<span class="ido">
								<?php
								echo strftime("%H:%M", strtotime($cikk->datum_tol));
								if($cikk->datum_ig){
									echo ' - '.strftime("%H:%M", strtotime($cikk->datum_ig));
								}
								?>
							</span>
						</time>
						<?php endif ?>
						<h3 class="nemzene-listaelem-cim">
							<?php echo HTML::anchor($cikk->get_link(), $cikk->cim, array()) ?>
						</h3>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>

	<?php echo HTML::anchor('/nemzene', 'Tovább az összes programra', array("class"=>"tovabb-link")) ?>
</section>

<section class="fooldal-gasztro">
	<header>
		<h1 class="section-cim text-white">Gasztro</h1>
	</header>
	<div class="flex-column flex-row-sm flex-justify-center">
		<div class="fooldal-gasztro-kocka kocka-piros wow fadeInUp" data-wow-delay="0">
			<div class="fooldal-gasztro-szam">13</div>
			<div class="fooldal-gasztro-item">borászat</div>
		</div>
		<div class="fooldal-gasztro-kocka kocka-sarga wow fadeInUp" data-wow-delay="0.3s">
			<div class="fooldal-gasztro-szam">5</div>
			<div class="fooldal-gasztro-item">kiváló sör</div>
		</div>
		<div class="fooldal-gasztro-kocka kocka-zold wow fadeInUp" data-wow-delay="0.6s" style="padding: 0 1em;">
			<div class="fooldal-gasztro-szam text-nowrap">20</div>
			<div class="fooldal-gasztro-item text-center">melegkonyhás kitelepülő</div>
		</div>
		<?php /*
		<div class="fooldal-gasztro-kocka kocka-piros wow fadeInUp" data-wow-delay="0.9s">
			<div class="fooldal-gasztro-szam">14</div>
			<div class="fooldal-gasztro-item">streetfood kocsi</div>
		</div>
 		*/ ?>
	</div>

	<?php echo HTML::anchor('/gasztro', 'Részletek', array("class"=>"tovabb-link")) ?>
</section>-->