<p class="nemzene-subtitle">A Fishing minden 'nemzenei' programja.<br>Off-programok, színház, gyerekprogramok - és minden más.</p>
<section class="container">
	<div class="row">
		<article class="col-sm-8 hir">
			<div class="flex">
				<?php if($cikk->datum_tol>0): ?>
					<time class="nemzene-listaelem-datum" datetime="<?php echo $cikk->datum_tol ?>">
						<span class="m"><?php echo strftime("%B", strtotime($cikk->datum_tol)) ?></span>
						<span class="d"><?php echo strftime("%d", strtotime($cikk->datum_tol)) ?></span>
					<span class="ido">
						<?php
						echo strftime("%H:%M", strtotime($cikk->datum_tol));
						if($cikk->datum_ig){echo ' - '.strftime("%H:%M", strtotime($cikk->datum_ig));}
						?>
					</span>
					</time>
				<?php endif ?>
				<h3 class="nemzene-listaelem-cim">
					<?php echo HTML::anchor($cikk->get_link(), $cikk->cim, array()) ?>
				</h3>
			</div>

			<?php if($cikk->get_kep()): ?>
				<br>
				<picture>
					<?php echo HTML::image($cikk->get_kep(), array("alt"=>htmlspecialchars($cikk->cim), "class"=>"img-responsive hirek-listaelem-img")) ?>
				</picture>
			<?php endif ?>

			<div class="hir-lead">
				<?php echo $cikk->lead ?>
			</div>

			<div class="cikk">
				<?php echo $cikk->szoveg ?>
			</div>

			<?php foreach($cikk->jegy->latszik()->find_all() as $jegy): ?>
				<br>
				<div class="jegy<?php if($jegy->elfogyott) echo ' elfogyott' ?> flex-column flex-row-sm">
					<div class="jegy-ticket">
						<h2 class="jegy-nev"><?php echo $jegy->nev ?></h2>
						<p class="jegy-ar"><?php echo $jegy->ar ?></p>
					</div>

					<div class="jegy-reszletek">
						<?php if($jegy->leiras): ?>
							<p class="jegy-leiras"><?php echo $jegy->leiras ?></p>
						<?php endif ?>

						<?php if(!$jegy->elfogyott):
							echo HTML::anchor($jegy->link, "Jegyvásárlás", array("target" => "_blank", "class" => "btn jegy-btn"));
						else: ?>
							<div class="jegy-elfogyott-label">Elfogyott</div>
						<?php endif ?>
					</div>
				</div>
			<?php endforeach; ?>
		</article>
		<aside class="col-sm-4">
			<?php foreach($cikkek as $n=>$cikk):
				echo View::factory('nemzene/listaelem', array('model'=>$cikk, 'n'=>$n, 'jegy_latszik'=>false)).'<br>';
			endforeach;  ?>

			<div class="text-center">
				<?php echo HTML::anchor('/nemzene', 'Összes program', array('class'=>'btn btn-danger')) ?>
			</div>
		</aside>
	</div>
</section>