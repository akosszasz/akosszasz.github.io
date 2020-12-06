<?php echo HTML::anchor('/admin/archivum/ev/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új', array('class' => 'btn btn-primary pull-right', 'style'=>'margin-left: .5em;')); ?>
<?php echo HTML::anchor('/admin/archivum/ev', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>
<div class="urlap">
	<?php echo Form::open("", array("class" => "slider", "enctype"=>"multipart/form-data")); ?>

		<div class="form-group">
			<?php $id = "id" ?>
			<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
			<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
		</div>

		<div class="form-group">
			<?php $id = "lead" ?>
			<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
			<?php echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'rows'=>5)) ?>
		</div>

		<div class="form-group">
			<?php echo Form::label("hash", "Logo feltöltés") ?>
			<?php echo Form::file("hash", array('id'=>'hash')) ?>
			<?php echo Form::hidden('elozo_kep',$model->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
			<?php if($model->get_kep()) echo HTML::image($model->get_kep(), array("class"=>"img-responsive")) ?>
		</div>

		<div>
			<?php $id = "aktiv" ?>
			<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
			<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
		</div>

		<?php /*
		<div class="form-group">
			<?php $id = "kiemelt_video_id" ?>
			<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
			<?php echo Form::select($id, $videok, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
		</div>
 		*/ ?>

		<br>

		<div class="form-group">
			<p><?php echo Form::submit("submit", "Mentés", array('class' => 'btn btn-primary')) ?></p>
		</div>

	<?php echo Form::close() ?>
</div>