<article class="nemzene-listaelem listaelem">
	<div class="nemzene-listaelem-content listaelem-content">
		<div class="flex">
			<?php if($model->datum_tol>0): ?>
			<time class="nemzene-listaelem-datum" datetime="<?php echo $model->datum_tol ?>">
				<span class="m"><?php echo strftime("%B", strtotime($model->datum_tol)) ?></span>
				<span class="d"><?php echo strftime("%d", strtotime($model->datum_tol)) ?></span>
				<span class="ido">
					<?php
					echo strftime("%H:%M", strtotime($model->datum_tol));
					if($model->datum_ig){echo ' - '.strftime("%H:%M", strtotime($model->datum_ig));}
					?>
				</span>
			</time>
			<?php endif ?>
			<h3 class="nemzene-listaelem-cim">
				<?php echo HTML::anchor($model->get_link(), $model->cim, array()) ?>
			</h3>
		</div>

		<br>

		<?php if($model->get_kep()): ?>
		<a href="<?php echo URL::site($model->get_link(), 'http', Kohana::$environment!=Kohana::PRODUCTION) ?>">
			<?php echo HTML::image($model->get_kep(), array("alt"=>htmlspecialchars($model->cim), "class"=>"img-responsive nemzene-listaelem-img")) ?>
		</a>
		<?php endif ?>

		<div class="nemzene-listaelem-szoveg">
			<?php echo $model->lead ?>
			<?php echo HTML::anchor($model->get_link(), 'Tovább', array('class'=>'btn btn-xs btn-danger')) ?>
		</div>

		<?php
		if(!isset($jegy_latszik)) $jegy_latszik = true;
		if($jegy_latszik):
			foreach($model->jegy->latszik()->find_all() as $jegy): ?>
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
		<?php endforeach;
			endif;
		?>

		<hr>
	</div>
</article>
