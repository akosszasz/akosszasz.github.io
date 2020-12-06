<div class="clearfix">
	<?php
	if($model->id) echo HTML::anchor('/admin/jegytipus/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új jegytípus hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
	echo HTML::anchor('/admin/jegytipus', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right'));
	?>
</div>

<?php echo Form::open('/admin/jegytipus/szerkeszt/' . $model->id, array("class"=>"clearfix")); ?>
	<div class="form-group">
		<?php $id = "nev" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control', 'maxlength'=>255)) ?>
	</div>

	<div class="form-group">
		<?php $name = 'szoveg_cim' ?>
		<?php echo Form::label($name, 'Szöveg cím:'); ?>
		<?php echo Form::input($name, $model->$name, array('id' => $name, 'class' => 'form-control')); ?>
	</div>
	<div class="form-group">
		<?php $name = 'szoveg' ?>
		<?php echo Form::label($name, 'Szöveg:'); ?>
		<?php echo Form::ckeditor($name, $model->$name, array('id' => $name), 'auto'); ?>
	</div>

	<div>
		<?php $id = "aktiv" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<br>

	<div class="form-group">
		<?php echo Form::submit('jegytipus_ok', 'Mentés', array("class" => "btn btn-primary")); ?>
	</div>

<?php echo Form::close(); ?>
