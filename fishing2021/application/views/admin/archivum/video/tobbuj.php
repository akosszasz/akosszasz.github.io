<?php echo HTML::anchor('/admin/archivum/video', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>

<?php echo Form::open(null, array("class"=>"video-form")) ?>

	<div class="form-group">
		<?php $id = "archivum_ev_id" ?>
		<?php echo Form::label($id, "1. ".Arr::get($model->labels(), $id)) ?>
		<?php echo Form::select($id, $evek, $model->$id, array('id' => $id, 'class' => 'form-control', "data-action"=>URL::site("/admin/archivum/szinpad/getszinpadok", "http", Kohana::$environment==Kohana::TESTING))) ?>
	</div>

	<div class="form-group">
		<?php $id = "archivum_szinpad_id" ?>
		<?php echo Form::label($id, "2. ".Arr::get($model->labels(), $id)) ?>
		<small class="text-muted help-block">(Év kiválasztása után ez a lista frissül, az adott évhez tartozó színpadokat betölti. Ha nincs színpad, nem lesz itt semmi.)</small>
		<?php echo Form::select($id, array(), $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<div class="form-group">
		<?php $id = "youtube_id" ?>
		<?php echo Form::label($id, Arr::get($model->labels(), $id)."-k") ?>
		<small class="text-muted help-block">(Soronként 1db Youtube ID, nem kell space és semmi más sem, kizárólag soronként 1 db ID. A videók címei Youtube-ról be lesznek töltve, emiatt lehet, hogy lassú lesz a mentés, ha sok ID van.)</small>
		<?php echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control')) ?>
	</div>

	<br>

	<div class="form-group">
		<p><?php echo Form::submit("submit", "Mentés", array('class' => 'btn btn-primary')) ?></p>
	</div>

<?php echo Form::close() ?>
