<?php echo HTML::anchor('/admin/archivum/video/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új', array('class' => 'btn btn-primary pull-right', 'style'=>'margin-left: .5em;')); ?>
<?php echo HTML::anchor('/admin/archivum/video', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>

<?php echo Form::open(null, array("class"=>"video-form")) ?>

	<?php if($model->loaded()): echo HTML::anchor($model->get_link(), null, array("target"=>"_blank")) ?><br><br><?php endif ?>

<?php
echo URL::site("/admin/archivum/szinpad/getszinpadok", "http");
?>

	<div class="form-group">
		<?php $id = "archivum_ev_id" ?>
		<?php echo Form::label($id, "1. ".Arr::get($model->labels(), $id)) ?>
		<?php echo Form::select($id, $evek, $model->$id, array('id' => $id, 'class' => 'form-control', "data-action"=>URL::site("/admin/archivum/szinpad/getszinpadok", "http", Kohana::$environment==Kohana::TESTING))) ?>
	</div>

	<div class="form-group">
		<?php $id = "archivum_szinpad_id" ?>
		<?php echo Form::label($id, "2. ".Arr::get($model->labels(), $id)) ?>
		<small class="text-muted help-block">(Év kiválasztása után ez a lista frissül, az adott évhez tartozó színpadokat betölti. Ha nincs színpad, nem lesz itt semmi.)</small>
		<?php echo Form::select($id, $szinpadok, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<div class="form-group">
		<?php $id = "youtube_id" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<div class="form-group">
		<?php $id = "youtube_title" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)) ?>
		<?php if(!$model->loaded()): ?>
			<small class="text-muted help-block">(Új videó hozzáadásakor ha nincs megadva, Youtube-ról lesz betöltve a cím mentéskor)</small>
		<?php endif ?>
		<?php echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<div>
		<?php $id = "aktiv" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<div>
		<?php $id = "kiemelt" ?>
		<?php echo Form::checkbox($id, '1', $model->id ? (bool)$model->$id : true, array('id'=>$id,'class'=>'inline')) ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id), array('class'=>'inline')) ?>
	</div>

	<br>

	<div class="form-group">
		<p><?php echo Form::submit("submit", "Mentés", array('class' => 'btn btn-primary')) ?></p>
	</div>

<?php echo Form::close() ?>
