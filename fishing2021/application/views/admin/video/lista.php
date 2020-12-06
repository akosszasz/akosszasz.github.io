<div class="pull-right">
	<?php echo HTML::anchor('/admin/video/szerkeszt/', HTML::ikon("glyphicon glyphicon-plus").' Új videó hozzáadása', array('class' => 'btn btn-primary')); ?>
</div>

<div class="clearfix"></div>

<table class="admin-tabla table table-striped">
	<thead>
		<tr>
			<th>Cím</th>
			<th>Nyelv</th>
			<th>Youtube</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($lista as $l): ?>
			<tr>
				<td><?php echo $l->cim ?></td>
				<td><?php echo $l->lang ?></td>
				<td><?php echo HTML::anchor(Youtube::get_link($l->youtube_id), 'Youtube link', array('target' => '_blank')); ?></td>
				<td><?php echo HTML::anchor('/admin/video/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-primary')); ?></td>
				<td><?php echo HTML::anchor('/admin/video/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-danger')); ?></td>
			</tr>
		<?php endforeach; ?>
</table>
