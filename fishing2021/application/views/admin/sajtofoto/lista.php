<div class="pull-right">
	<?php echo HTML::anchor('/admin/galeria/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új galéria hozzáadása', array('class' => 'btn btn-primary')); ?>
</div>

<form class="form-inline" method="post">
	<div class="form-group">
		<input type="text" name="keres" placeholder="Keresés" class="form-control" value="<?php echo Arr::get($_POST, "keres") ?>">
	</div>
	<button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-search"></span>
	</button>
	<a href="" class="btn btn-default" title="szűrés törlése">
		<span class="glyphicon glyphicon-remove"></span>
	</a>
</form>

<div class="clearfix"></div>

<br>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Dátum</th>
			<th>Cím</th>
			<th>Leírás</th>
			<th style="width:100px"></th>
			<th style="width:100px"></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($lista as $l): ?>
		<?php $galeria = $l->galeriafordit->where('lang', '=', 'hu')->find(); ?>
		<tr>
			<td><?php echo $l->datum; ?></td>
			<td><?php echo $galeria->get_cim(); ?></td>
			<td><?php echo Text::limit_chars(strip_tags($galeria->leiras), 300); ?></td>
			<td>
				<?php echo HTML::anchor('/admin/galeria/szerkeszt/' . $l->id, HTML::ikon("glyphicon glyphicon-edit").' Szerkeszt', array('class' => 'btn btn-primary')); ?>
			</td>
			<td><?php
			echo HTML::anchor('/admin/galeria/torol/' . $l->id, HTML::ikon("glyphicon glyphicon-remove").' Töröl', array('class' => 'confirm btn btn-danger'));
				?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
<div class="clearfix"></div>
<?php echo $lapozo; ?>
<div class="clearfix"></div>
