<div class="pull-right">
	<?php echo HTML::anchor('/admin/archivum/ev/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új', array('class' => 'btn btn-primary')); ?>
</div>
<div class="clearfix"></div>

<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Év</th>
			<th>Lead</th>
			<th>Látszik</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $key => $model): ?>
			<tr>
				<td><?php echo $model->id ?></td>
				<td><?php echo $model->lead ?></td>
				<td><?php echo $model->aktiv?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/ev/szerkeszt/" . $model->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés", array('class' => 'btn btn-sm btn-primary')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/archivum/ev/torol/" . $model->id, HTML::ikon("glyphicon glyphicon-remove")." törlés", array('class' => 'confirm btn btn-sm btn-danger')); ?>
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

