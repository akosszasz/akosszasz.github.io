<?php
if($szoveg->id) echo HTML::anchor('/admin/kulsoprogram/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új program hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor('/admin/kulsoprogram', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<div class="clearfix">
	<?php echo Form::open('/admin/kulsoprogram/szerkeszt/' . $szoveg->id,  array("enctype"=>"multipart/form-data")); ?>

		<div class="form-group">
			<?php $name = 'cim' ?>
			<?php echo Form::label($name, 'Cím:'); ?>
			<?php echo Form::input($name, $szoveg->$name, array('id' => $name, 'class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php $name = 'link' ?>
			<?php echo Form::label($name, 'Link:'); ?>
			<div class="text-muted pull-right"><small>Ha nincs megadva, a címből lesz automatikusan generálva</small></div>
			<?php echo Form::input($name, $szoveg->$name, array('id' => $name, 'class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php $name = 'szoveg' ?>
			<?php echo Form::label($name, 'Szöveg:'); ?>
			<?php echo Form::ckeditor($name, $szoveg->$name, array('id' => $name), 'auto'); ?>
		</div>

		<div class="form-group">
			<?php $name = 'jegyek' ?>
			<?php echo Form::label($name, 'Kapcsolódó jegyek:'); ?>
			<small class="help-block text-muted">(több is kiválasztható, ctrl lenyomva tartásával)</small>
			<?php echo Form::select($name.'[]', $jegyek, $szoveg->jegy->find_all()->as_array('id','id'), array('id' => $name, 'multiple', 'style' => 'height: 12em;', 'class'=>'form-control')); ?>
		</div>

		<div>
			<?php echo Form::checkbox("aktiv", '1', $szoveg->id ? (bool)$szoveg->aktiv : true, array('id'=>'aktiv','class'=>'inline')) ?>
			<?php echo Form::label("aktiv", "látszik",array('class'=>'inline')) ?>
		</div>

		<div class="form-group">
			<?php echo Form::label("hash", "Kép feltöltés") ?>
			<?php echo Form::file("hash", array('id'=>'hash')) ?>
			<?php echo Form::hidden('elozo_kep',$szoveg->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
			<?php if($szoveg->get_kep()) echo HTML::image($szoveg->get_kep(), array("class"=>"img-responsive", "style"=>"margin-top: 1em;")) ?>
		</div>

		<br>

		<div class="form-group">
			<?php echo Form::submit('szoveg_ok', 'Mentés', array("class" => "btn btn-primary")); ?>
		</div>

	<?php echo Form::close(); ?>
</div>
