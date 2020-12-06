<div class="pull-right">
	<?php echo HTML::anchor('/admin/hirek/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új Hír Hozzáadása', array('class' => 'btn btn-primary')); ?>
</div>
<div class="clearfix"></div>

<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Cím</th>
			<th>Dátum</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($hirek as $key => $hir): ?>
			<tr>
				<td><?php echo $hir->forditva()->cim ?></td>
				<td><?php echo $hir->datum ?></td>
				<td>
					<?php echo HTML::anchor("/admin/hirek/szerkeszt/" . $hir->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés", array('class' => 'btn btn-sm btn-primary')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/hirek/torol/" . $hir->id, HTML::ikon("glyphicon glyphicon-remove")." törlés", array('class' => 'confirm btn btn-sm btn-danger')); ?>
				</td>
			</tr>
		<?php endforeach ?>
		<?php if(!isset($hir)): ?>
			<tr>
				<td colspan="5" class="text-center text-muted">(nincs találat)</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>

