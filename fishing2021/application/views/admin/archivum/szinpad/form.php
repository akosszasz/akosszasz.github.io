<?php echo HTML::anchor('/admin/archivum/szinpad/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új', array('class' => 'btn btn-primary pull-right', 'style'=>'margin-left: .5em;')); ?>
<?php echo HTML::anchor('/admin/archivum/szinpad', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>

<?php echo Form::open() ?>

	<div class="form-group">
		<?php $id = "archivum_ev_id" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::select($id, $evek, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div class="form-group">
		<?php $id = "nev" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div>
		<?php $id = "aktiv" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<br>

	<div class="form-group">
		<p><?php echo Form::submit("submit", "Mentés", array('class' => 'btn btn-primary')) ?></p>
	</div>

<?php echo Form::close() ?>
