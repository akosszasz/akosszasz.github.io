<div class="clearfix">
	<?php if($model->loaded()) echo HTML::anchor('/admin/tamogato/hozzaad', HTML::ikon("glyphicon glyphicon-plus").' Új támogató hozzáadása', array('class'=>'btn btn-primary pull-right', 'style'=>'margin-left: 1em;')); ?>
	<?php echo HTML::anchor('/admin/tamogato', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a támogatókhoz',array('class'=>'btn btn-success pull-right')); ?>
</div>

<?php echo Form::open("", array("class" => "tamogato", "enctype"=>"multipart/form-data")) ?>

		<div class="form-group">
			<?php
			$id = "nev";
			echo Form::label($id, Arr::get($model->labels(), $id));
			echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
			?>
		</div>

		<div class="radio">
			<label>
				<?php echo Form::radio("tipus", "tamogato", ($model->tipus=="tamogato" or !$model->loaded())) ?> Támogató
			</label>
		</div>
		<div class="radio">
			<label>
				<?php echo Form::radio("tipus", "partner", ($model->tipus=="partner")) ?> Együttműködő partner
			</label>
		</div>

		<div class="form-group">
			<?php
			$id = "url";
			echo Form::label($id, Arr::get($model->labels(), $id));
			echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
			?>
		</div>

		<div>
			<?php echo Form::checkbox("latszik", '1', $model->id ? (bool)$model->latszik : true, array('id'=>'latszik','class'=>'inline')) ?>
			<?php echo Form::label("latszik", "látszik",array('class'=>'inline')) ?>
		</div>

		<div>
			<label>Kép</label>
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