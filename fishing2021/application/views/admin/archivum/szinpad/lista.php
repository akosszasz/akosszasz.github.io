<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<div class="pull-right">
		<?php echo HTML::anchor('/admin/archivum/szinpad/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új', array('class' => 'btn btn-primary')); ?>
	</div>
</div>

<table class="admin-tabla table rendezheto table-striped">
	<thead>
		<tr>
			<th>Év</th>
			<th>Színpad</th>
			<th>Látszik</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody class="rendez" data-action="<?php echo URL::site("/admin/archivum/szinpad/sorrend", "http", Kohana::$environment==Kohana::TESTING) ?>">
		<?php foreach ($lista as $key => $model): ?>
			<tr id="item_<?php echo $model->id; ?>">
				<td><?php echo $model->ev->id ?></td>
				<td><?php echo $model->nev ?></td>
				<td><?php echo $model->aktiv?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/szinpad/szerkeszt/" . $model->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés", array('class' => 'btn btn-sm btn-primary')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/szinpad/torol/" . $model->id, HTML::ikon("glyphicon glyphicon-remove")." törlés", array('class' => 'confirm btn btn-sm btn-danger')); ?>
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

