<div class="pull-right"><?php
echo HTML::anchor('/admin/szoveg/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új Szöveg Hozzáadása', array('class' => 'btn btn-primary'));
?></div>
<div class="clearfix"></div>
<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Cím</th>
			<th>Szöveg</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $l): ?>
			<tr>
				<td><?php echo $l->cim ?></td>
				<td><?php echo Text::limit_chars(strip_tags($l->szoveg), 200); ?></td>
				<td class="text-right">
					<?php echo HTML::anchor('/admin/szoveg/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-sm btn-danger pull-right', "style"=>"margin: 2px;")); ?>
					<?php echo HTML::anchor('/admin/szoveg/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-sm btn-primary pull-right', "style"=>"margin: 2px;")); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		<?php if(!isset($l)): ?>
			<tr>
				<td colspan="5" class="text-center text-muted">(nincs találat)</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>
<div class="clearfix"></div>
