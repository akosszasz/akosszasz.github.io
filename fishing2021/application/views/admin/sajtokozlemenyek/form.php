<?php echo Form::open(); ?>

	<div class="form-group">
		<?php $name = 'szoveg' ?>
		<?php echo Form::label($name, 'Szöveg:'); ?>
		<?php echo Form::ckeditor($name, $szoveg->$name, array('id' => $name), 'auto'); ?>
	</div>

	<?php if ($szoveg->loaded()): ?>
		<p><strong>Fájlok feltöltése</strong><br>
			<small>
				- egyszerre többet is lehet<br>
				- feltöltés után a "Böngészés a szerveren ablakban lehet kiválasztani, a sajto mappából<br>
				- ékezeteket ne tartalmazzon a fájl neve
			</small>
		</p>
		<div class="tobbfilefeltoltes"
			 data-action="<?php echo URL::site('/admin/sajtokozlemeny/feltoltes', 'http') ?>"
			 data-update="/admin/sajtokozlemeny"
			 data-error="hiba"
			 >
			<noscript>
			<p>A fájlfeltöltés használatához javascript engedélyezésére van szükség!</p>
			</noscript>
			<div id="hiba2"></div>
		</div>
	<?php endif; ?>

	<div class="clearfix"></div>
	
	<p><?php echo Form::submit('galeria_ok', 'Mentés', array("class" => "btn btn-primary")); ?></p>
<?php echo Form::close(); ?>
