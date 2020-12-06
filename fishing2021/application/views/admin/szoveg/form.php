<?php
if($szoveg->id) echo HTML::anchor('/admin/szoveg/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új szöveg hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor('/admin/szoveg', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<div class="urlap">
	<?php echo Form::open('/admin/szoveg/szerkeszt/' . $szoveg->id); ?>
		<?php echo Form::hidden('nyelv', 'hu') ?>
		<div class="form-group">
			<?php $name = 'cim' ?>
			<?php echo Form::label($name, 'Cím:'); ?>
			<?php echo Form::input($name, $szoveg->$name, array('id' => $name, 'class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php $name = 'szoveg' ?>
			<?php echo Form::label($name, 'Szöveg:'); ?>
			<?php echo Form::ckeditor($name, $szoveg->$name, array('id' => $name), 'auto'); ?>
		</div>

		<br>

		<div class="form-group">
			<?php echo Form::submit('szoveg_ok', 'Mentés', array("class" => "btn btn-primary")); ?>
		</div>

	<?php echo Form::close(); ?>
</div>
<div class="clearfix"></div>
