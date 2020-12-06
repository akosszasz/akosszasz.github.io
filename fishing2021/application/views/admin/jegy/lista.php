<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<?php echo HTML::anchor('/admin/jegy/hozzaad', HTML::ikon("glyphicon glyphicon-plus").' Új jegy hozzáadása', array('class'=>'btn btn-primary pull-right')); ?>
</div>

<?php if (count($lista)): ?>
	<table class="admin-tabla rendezheto table table-striped">
		<thead>
			<tr>
				<th>Típus</th>
				<th>Név</th>
				<th>Ár</th>
				<th>Elfogyott</th>
				<th>Látszik</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="rendez" data-action="<?php echo Kohana::$environment==Kohana::PRODUCTION ? '' : Kohana::$base_url.Kohana::$index_file ?>/admin/jegy/sorrend">
		<?php foreach ($lista as $key => $l): ?>
			<tr id="item_<?php echo $l->id; ?>">
				<td><?php echo $l->tipus->nev ?></td>
				<td><?php echo $l->nev ?></td>
				<td><?php echo $l->ar ?></td>
				<td class="text-center"><?php echo $l->elfogyott ? '<span class="glyphicon glyphicon-remove text-danger"></span>': "&ndash;" ?></td>
				<td class="text-center"><?php echo $l->aktiv ? '<span class="glyphicon glyphicon-ok"></span>': "&ndash;" ?></td>
				<td>
					<?php echo HTML::anchor("/admin/jegy/szerkeszt/".$l->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés",array('class'=>'btn btn-primary btn-small')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/jegy/torol/".$l->id, HTML::ikon("glyphicon glyphicon-remove")." törlés",array('class'=>'confirm btn btn-danger btn-small')); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<p class="text-center"><br>Nincs feltöltve jegy</p>
	<br>
<?php endif ?>