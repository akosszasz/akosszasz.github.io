<div class="clearfix">
	<?php
	if($model->id) echo HTML::anchor('/admin/jegy/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új jegy hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
	echo HTML::anchor('/admin/jegy', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a jegyekhez',array('class'=>'btn btn-primary pull-right'));
	?>
</div>

<?php echo Form::open() ?>

	<div class="form-group">
		<?php $id = "jegy_tipus_id" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::select($id, $tipusok, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<div class="form-group">
		<?php $id = "nev" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div class="form-group">
		<?php $id = "link" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div class="form-group">
		<?php $id = "ar" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div class="form-group">
		<?php $id = "leiras" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'rows' => 4)) ?>
	</div>

	<div>
		<?php $id = "elfogyott" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : false, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<div>
		<?php $id = "aktiv" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<br>

	<div>
		<p><?php echo Form::submit("submit", "Mentés", array('class'=>'btn btn-primary')) ?></p>
	</div>

<?php echo Form::close() ?>