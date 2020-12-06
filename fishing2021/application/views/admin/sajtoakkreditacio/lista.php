<?php if (count($lista)): ?>
	<p class="text-muted">Összesen: <?php echo count($lista) ?> db</p>

	<table class="admin-tabla table table-striped table-hover">
		<thead>
			<tr>
				<th>Dátum</th>
				<th><?php echo $model->labels('medium_nev') ?></th>
				<th><?php echo $model->labels('munkatars_nev') ?></th>
				<th><?php echo $model->labels('munkatars_tevekenyseg') ?></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($lista as $l): ?>
			<tr>
				<td class="text-nowrap"><?php echo $l->datum ?></td>
				<td><?php echo $l->medium_nev ?></td>
				<td><?php echo $l->munkatars_nev ?></td>
				<td><?php echo $l->munkatars_tevekenyseg ?></td>
				<td><?php echo HTML::anchor("/admin/sajtoakkreditacio/details/".$l->id, "Részletek", array("class"=>"btn btn-primary btn-xs")) ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<p>Nincs még sajtóakkreditáció</p>
<?php endif ?>