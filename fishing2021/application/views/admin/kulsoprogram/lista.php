<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<?php
	echo HTML::anchor('/admin/kulsoprogram/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új program Hozzáadása', array('class' => 'btn btn-primary pull-right'));
	?>
</div>

<table class="admin-tabla rendezheto table table-striped">
	<thead>
		<tr>
			<th>Cím</th>
			<th>Link</th>
			<th class="text-center">Látszik</th>
			<th></th>
		</tr>
	</thead>
	<tbody class="rendez" data-action="<?php echo Kohana::$environment==Kohana::PRODUCTION ? '' : Kohana::$base_url.Kohana::$index_file ?>/admin/kulsoprogram/sorrend">
		<?php foreach ($lista as $l): ?>
			<tr id="item_<?php echo $l->id; ?>">
				<td><?php echo $l->cim ?></td>
				<td><?php //echo HTML::anchor($l->get_link(), $l->link, array("target"=>"_blank")) ?></td>
				<td class="text-center"><?php echo $l->aktiv ? '<span class="glyphicon glyphicon-ok"></span>': "&ndash;" ?></td>
				<td>
					<?php echo HTML::anchor('/admin/kulsoprogram/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-sm btn-danger pull-right')); ?>
					<?php echo HTML::anchor('/admin/kulsoprogram/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-sm btn-primary pull-right')); ?>
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
