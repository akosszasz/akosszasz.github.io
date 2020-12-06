	<?php echo Form::open(); ?>

		<strong>Képfeltöltés</strong>
		<div class="tobbkepfeltoltes"
			 data-action="<?php echo URL::site('/admin/sajtofoto/kepfeltoltes', 'http') ?>"
			 data-update="<?php echo URL::site('/admin/sajtofoto', 'http') ?>"
			 data-error="hiba"
			 >
			<noscript>
			<p>A fájlfeltöltés használatához javascript engedélyezésére van szükség!</p>
			</noscript>
			<div id="hiba2"></div>
		</div>

		<p class="text-muted">Sorrend módosítása: drag&amp;drop a lista elemein</p>

		<ul class="rendezheto list-unstyled" data-action="<?php echo URL::site('/admin/sajtofoto/sorrend', 'http') ?>">
			<?php foreach ($galeria as $kep): ?>
				<li id="item_<?php echo $kep->id ?>" class="egykep clearfix" style="margin-bottom: 20px;">
					<div class="row">
						<div class="col-sm-3">
							<?php echo Html::image($kep->get_kiskep(), array('class' => 'img-responsive')); ?>
						</div>
						<div class="col-sm-9">
							<div class="form-group">
								<?php echo Form::input("kep[".$kep->id."][leiras]", $kep->leiras, array('class' => 'form-control', 'placeholder' => 'képaláírás')); ?>
							</div>
							<label><?php echo Form::checkbox("kep[".$kep->id."][aktiv]", 1, (bool)$kep->aktiv, array()); ?> látszik</label>
							<?php echo Html::anchor('/admin/sajtofoto/keptorol/' . $kep->id, 'Töröl', array('class' => 'btn btn-danger btn-sm confirm keptorol pull-right')); ?>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>

		<br>

		<p><?php echo Form::submit('galeria_ok', 'Mentés', array("class" => "btn btn-lg btn-primary")); ?></p>
<?php echo Form::close(); ?>
