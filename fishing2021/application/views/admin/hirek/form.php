<?php echo HTML::anchor('/admin/hirek', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<div class="urlap">
	<?php echo Form::open("", array("class" => "slider", "enctype"=>"multipart/form-data")); ?>

	<?php $kod = 'hu' ?>
		<div class="form-group">
			<?php echo Form::label("cim_" . $kod, "Cím") ?>
			<?php echo Form::input("cim_" . $kod, $forditasok[$kod]->cim, array('id' => "cim_" . $kod, 'class' => 'form-control')) ?>
		</div>
		<div class="form-group">
			<?php echo Form::label("lead_" . $kod, "Lead") ?>
			<?php echo Form::textarea("lead_" . $kod, $forditasok[$kod]->lead, array('id' => "lead_" . $kod, 'class' => 'form-control', 'rows'=>4)) ?>
		</div>
		<div class="form-group">
			<?php echo Form::label("szoveg_" . $kod, "Szöveg") ?>
			<?php echo Form::ckeditor("szoveg_" . $kod, $forditasok[$kod]->szoveg, array('id' => "szoveg_" . $kod), 'auto'); ?>
		</div>

		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label("datum", "Dátum") ?>
					<?php echo Form::input("datum", $model->datum ? $model->datum : date("Y-m-d"), array('id' => 'datum', 'class' => 'datepicker form-control')) ?>
				</div>
			</div>
		</div>

		<div class="form-group">
			<?php echo Form::label("hash", "Kép feltöltés") ?>
			<?php echo Form::file("hash", array('id'=>'hash')) ?>
			<?php echo Form::hidden('elozo_kep',$model->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
			<?php if($model->get_kep()) echo HTML::image($model->get_kep(), array("class"=>"img-responsive")) ?>
		</div>

		<br>

		<div class="form-group">
			<p><?php echo Form::submit("submit", "Mentés", array('class' => 'btn btn-primary')) ?></p>
		</div>

		<?php /*
		<br>
		<h3>SEO</h3>
		<div class="form-group">
			<?php echo Form::label("seotitle_" . $kod, "Title:") ?>
			<?php echo Form::textarea("seotitle_" . $kod, $forditasok[$kod]->seotitle, array('id' => "seotitle_" . $kod, 'class' => 'form-control')) ?>
		</div>
		<div class="form-group">
			<?php echo Form::label("seokeywords_" . $kod, "Keywords:") ?>
			<?php echo Form::textarea("seokeywords_" . $kod, $forditasok[$kod]->seokeywords, array('id' => "seokeywords_" . $kod, 'class' => 'form-control')) ?>
		</div>
		<div class="form-group">
			<?php echo Form::label("seodescription_" . $kod, "Description:") ?>
			<?php echo Form::textarea("seodescription_" . $kod, $forditasok[$kod]->seodescription, array('id' => "seodescription_" . $kod, 'class' => 'form-control')) ?>
		</div>

		<br>
		 * 
		 */ ?>

	<?php echo Form::close() ?>
</div>