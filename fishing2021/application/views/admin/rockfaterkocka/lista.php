<div class="pull-right">
	<?php echo HTML::anchor('/admin/rockfaterkocka/szerkeszt/', HTML::ikon("glyphicon glyphicon-plus").' Új szöveg hozzáadása', array('class' => 'btn btn-primary')); ?>
</div>

<div class="clearfix"></div>

<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Nyelv</th>
			<th>Cím</th>
			<th>Bőr Gyula</th>
			<th>Rockfater</th>
			<th>Látszik</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $l): ?>
			<tr>
				<td><?php echo $l->lang ?></td>
				<td><?php echo $l->cim ?></td>
				<td><?php echo $l->borgyula ?></td>
				<td><?php echo $l->rockfater ?></td>
				<td class="text-center"><?php echo $l->latszik?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td><?php echo HTML::anchor('/admin/rockfaterkocka/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-primary')); ?></td>
				<td><?php echo HTML::anchor('/admin/rockfaterkocka/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-danger')); ?></td>
			</tr>
		<?php endforeach; ?>
</table>
