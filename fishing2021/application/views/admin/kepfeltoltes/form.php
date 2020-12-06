	<?php echo Form::open(); ?>

		<p>Több kép feltöltése userfiles mappába</p>
	
		<div class="tobbkepfeltoltes"
			 data-action="<?php echo URL::site('/admin/kepfeltoltes/kepfeltoltes', 'http') ?>"
			 data-update="<?php echo URL::site('/admin/kepfeltoltes', 'http') ?>"
			 data-error="hiba"
			 >
			<noscript>
			<p>A fájlfeltöltés használatához javascript engedélyezésére van szükség!</p>
			</noscript>
			<div id="hiba2"></div>
		</div>


		<div style="display: flex; flex-wrap: wrap; margin: 0 -5px;">
			<?php foreach ($kepek as $kep): ?>
				<figure class="text-center" style="flex-basis: calc(25% - 12px); margin: 5px; padding: 10px; background: #f0f0f0; border: 1px solid #ddd;">
					<?php echo Html::anchor($kep, Html::image($kep, array('class' => 'img-responsive center-block', 'style'=>'max-height: 200px')), array('target'=>'_blank'), null, false); ?>
					<figcaption><?php echo $kep ?></figcaption>
				</figure>
			<?php endforeach; ?>
		</div>

	<?php echo Form::close(); ?>