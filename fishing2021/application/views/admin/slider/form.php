<div class="clearfix">
	<?php echo HTML::anchor('/admin/slider', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a sliderekhez',array('class'=>'btn btn-primary pull-right')); ?>
</div>

<?php echo Form::open("", array("class" => "slider", "enctype"=>"multipart/form-data")) ?>

		<?php /* foreach(Kohana::$config->load('nyelvek.nyelvek') as $kod=>$nyelv): ?>

			<div class="form-group">
				<?php echo Form::label("cim_" . $kod, "Cím (".$kod."):") ?>
				<?php echo Form::input("cim_" . $kod, $forditasok[$kod]->cim, array('id' => "cim_" . $kod, 'class' => 'form-control')) ?>
			</div>

			<div class="form-group">
				<?php echo Form::label("alcim_" . $kod, "Alcím (".$kod."):") ?>
				<?php echo Form::input("alcim_" . $kod, $forditasok[$kod]->alcim, array('id' => "alcim_" . $kod, 'class' => 'form-control')) ?>
			</div>

			<div class="form-group">
				<?php echo Form::label("baszoka_" . $kod, "Baszóka szövege (".$kod."):") ?>
				<?php echo Form::input("baszoka_" . $kod, $forditasok[$kod]->baszoka, array('id' => "baszoka_" . $kod, 'class' => 'form-control')) ?>
			</div>
		<?php endforeach */ ?>

		<div>
			<?php echo Form::checkbox("latszik", '1', $model->id ? (bool)$model->latszik : true, array('id'=>'latszik','class'=>'inline')) ?>
			<?php echo Form::label("latszik", "látszik",array('class'=>'inline')) ?>
		</div>

		<?php if($model->hash) echo HTML::image($model->get_kep(), array("class"=>"img-thumbnail")) ?>

		<div>
			<?php echo Form::file("hash", array('id'=>'hash')) ?>
			<?php echo Form::hidden('elozo_kep',$model->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
		</div>

<?php /*
		<br>
		<label>Kép feltöltése</label>
		<?php if ($model->id != ''): ?>

			<div class="kepfeltoltes-tarolo">
				<div class="kepfeltoltes"
						data-action="<?php echo Kohana::$base_url.Kohana::$index_file ?>/admin/slider/sliderkepfeltoltes/<?php echo $model->id ?>"
						data-input-update="hash"
						data-error="hiba"
						data-jcrop="1.777"
				>
						<noscript>
							<p>A fájlfeltöltés használatához javascript engedélyezésére van szükség!</p>
						</noscript>
					</div>
				<div>
					<div id="hiba" class="kephiba alert alert-error"></div>
					<?php echo Html::image($model->get_kep(),array("id"=>"hash_kep")); ?>
					<?php echo Form::hidden('hash',$model->hash,array('id'=>'hash')); ?>
					<?php echo Form::hidden('elozo_kep',$model->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
				</div>
			</div>
			<input type="hidden" name="kep_c[w]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"w") ?>" id="w">
			<input type="hidden" name="kep_c[h]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"h") ?>" id="h">
			<input type="hidden" name="kep_c[x]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"x") ?>" id="x">
			<input type="hidden" name="kep_c[y]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"y") ?>" id="y">
			<input type="hidden" name="kep_c[x2]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"x2") ?>" id="x2">
			<input type="hidden" name="kep_c[y2]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"y2") ?>" id="y2">
			<br>
		<?php else: ?>
			<p>A képfeltöltés előtt mentenie kell.</p>
		<?php endif ?>
*/ ?>
		<br>

<div>
	<p><?php echo Form::submit("submit", "Mentés", array('class'=>'btn btn-primary')) ?></p>
</div>

<?php echo Form::close() ?>