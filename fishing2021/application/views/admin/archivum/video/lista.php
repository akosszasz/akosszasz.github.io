<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<div class="pull-right">
		<?php echo HTML::anchor('/admin/archivum/video/tobbuj', HTML::ikon("glyphicon glyphicon-plus").' egyszerre több videó hozzáadása', array('class' => 'btn btn-primary')); ?>
		<?php echo HTML::anchor('/admin/archivum/video/hozzaad', HTML::ikon("glyphicon glyphicon-plus").' 1 db új', array('class' => 'btn btn-primary')); ?>
	</div>
</div>

<hr>

<?php echo Form::open(null, array("class"=>"form-horizontal")) ?>
	<div class="form-group">
		<?php echo Form::label("szuro_video_ev", "Év", array("class"=>"col-sm-1 control-label")) ?>
		<div class="col-sm-3">
			<?php echo Form::select("szuro_video_ev", $evek, Session::instance()->get("szuro_video_ev", ""), array("id"=>"szuro_video_ev", "class"=>"form-control")) ?>
		</div>
		<?php echo Form::label("szuro_video_szinpad", "Színpad", array("class"=>"col-sm-1 control-label")) ?>
		<div class="col-sm-4">
			<?php echo Form::select("szuro_video_szinpad", $szinpadok, Session::instance()->get("szuro_video_szinpad", ""), array("id"=>"szuro_video_szinpad", "class"=>"form-control")) ?>
		</div>
		<div class="col-sm-3">
			<?php echo Form::submit("szures", "Szűrés", array("class"=>"btn btn-primary")) ?>
			<?php echo Form::submit("szures_torles", "Szűrés törlése", array("class"=>"btn btn-danger")) ?>
		</div>
	</div>
<?php echo Form::close() ?>

<hr>

<table class="admin-tabla table rendezheto table-striped">
	<thead>
		<tr>
			<th>Év</th>
			<th>Színpad</th>
			<th>Cím</th>
			<th>Youtube ID</th>
			<th>Kiemelt</th>
			<th>Látszik</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody class="rendez" data-action="<?php echo Kohana::$environment==Kohana::PRODUCTION ? '' : Kohana::$base_url.Kohana::$index_file ?>/admin/archivum/video/sorrend">
		<?php foreach ($lista as $key => $model): ?>
			<tr id="item_<?php echo $model->id; ?>">
				<td><?php echo $model->ev->id ?></td>
				<td><?php echo $model->has_szinpad() ? $model->szinpad->nev : '-' ?></td>
				<td><?php echo $model->youtube_title ?></td>
				<td><?php echo $model->youtube_id ?></td>
				<td><?php if($model->kiemelt): ?><span class="glyphicon glyphicon-ok text-success"></span><?php endif ?></td>
				<td><?php echo $model->aktiv?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/video/szerkeszt/" . $model->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés", array('class' => 'btn btn-sm btn-primary')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/video/torol/" . $model->id, HTML::ikon("glyphicon glyphicon-remove")." törlés", array('class' => 'confirm btn btn-sm btn-danger')); ?>
				</td>
			</tr>
		<?php endforeach ?>
		<?php if(!isset($model)): ?>
			<tr>
				<td colspan="5" class="text-center text-muted">(nincs találat)</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>

