<div class="pull-right"><?php
echo HTML::anchor('/admin/jegytipus/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új jegytípus', array('class' => 'btn btn-primary'));
?></div>
<div class="clearfix"></div>
<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Név</th>
			<th>Szöveg</th>
			<th>Látszik</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $l): ?>
			<tr>
				<td><?php echo $l->nev ?></td>
				<td><?php echo Text::limit_chars(strip_tags($l->szoveg), 200); ?></td>
				<td class="text-center"><?php echo $l->aktiv ? '<span class="glyphicon glyphicon-ok"></span>': "&ndash;" ?></td>
				<td>
					<?php echo HTML::anchor('/admin/jegytipus/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-sm btn-danger pull-right', 'style'=>'margin-left: 1em;')); ?>
					<?php echo HTML::anchor('/admin/jegytipus/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
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
