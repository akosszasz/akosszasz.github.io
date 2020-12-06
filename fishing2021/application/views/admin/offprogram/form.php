<?php
if($szoveg->id) echo HTML::anchor('/admin/offprogram/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új program hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor('/admin/offprogram', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<div class="clearfix">
	<?php echo Form::open('/admin/offprogram/szerkeszt/' . $szoveg->id, array("enctype"=>"multipart/form-data")); ?>

		<div class="form-group">
			<?php $name = 'cim' ?>
			<?php echo Form::label($name, 'Cím:'); ?>
			<?php echo Form::input($name, $szoveg->$name, array('id' => $name, 'class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php $name = 'tipus' ?>
			<?php echo Form::label($name, 'Program típusa:'); ?>
			<?php echo Form::select($name, array(0=>'(válassz)')+$tipusok, $szoveg->tipus, array('id' => $name, 'class'=>'form-control')); ?>
		</div>

		<div class="form-group">
			<?php $name = 'link' ?>
			<?php echo Form::label($name, 'Link:'); ?>
			<div class="text-muted pull-right"><small>Ha nincs megadva, a címből lesz automatikusan generálva</small></div>
			<?php echo Form::input($name, $szoveg->$name, array('id' => $name, 'class' => 'form-control')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label("lead", "Lead") ?>
			<?php echo Form::textarea("lead", $szoveg->lead, array('id' => "lead", 'class' => 'form-control', 'rows'=>4)) ?>
		</div>

		<div class="form-group">
			<?php $name = 'szoveg' ?>
			<?php echo Form::label($name, 'Szöveg:'); ?>
			<?php echo Form::ckeditor($name, $szoveg->$name, array('id' => $name), 'auto'); ?>
		</div>

		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label("datum_tol", "Dátum tól") ?>
					<?php echo Form::input("datum_tol", $szoveg->datum_tol, array('id' => 'datum_tol', 'class' => 'datetimepicker form-control')) ?>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<?php echo Form::label("datum_ig", "Dátum ig") ?>
					<?php echo Form::input("datum_ig", $szoveg->datum_ig, array('id' => 'datum', 'class' => 'datetimepicker form-control')) ?>
				</div>
			</div>
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
			<?php if($szoveg->get_kep()) echo HTML::image($szoveg->get_kep(), array("class"=>"img-responsive")) ?>
		</div>

		<br>

		<div class="form-group">
			<?php echo Form::submit('szoveg_ok', 'Mentés', array("class" => "btn btn-primary")); ?>
		</div>

	<?php echo Form::close(); ?>
</div>
