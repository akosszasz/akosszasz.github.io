<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<?php echo HTML::anchor('/admin/tamogato/hozzaad', HTML::ikon("glyphicon glyphicon-plus").' Új támogató hozzáadása', array('class'=>'btn btn-primary pull-right')); ?>
</div>

<?php if (count($tamogatok)): ?>
	<table class="admin-tabla rendezheto table table-striped">
		<thead>
			<tr>
				<th>Kép</th>
				<th>Típus</th>
				<th>Név</th>
				<th>Link</th>
				<th>Látszik</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="rendez" data-action="<?php echo Kohana::$environment==Kohana::PRODUCTION ? '' : Kohana::$base_url.Kohana::$index_file ?>/admin/tamogato/sorrend">
		<?php foreach ($tamogatok as $key => $tamogato): ?>
			<tr id="item_<?php echo $tamogato->id ?>">
				<td><?php echo HTML::image($tamogato->get_kep(), array('class'=>'img-thumbnail', 'width'=>'100px')) ?></td>
				<td><?php echo Arr::get($tamogato->labels(), $tamogato->tipus) ?></td>
				<td><?php echo $tamogato->nev ?></td>
				<td><?php echo $tamogato->url ?></td>
				<td class="text-center"><?php echo $tamogato->latszik?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td>
					<?php echo HTML::anchor("/admin/tamogato/szerkeszt/".$tamogato->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés",array('class'=>'btn btn-primary btn-small')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/tamogato/torol/".$tamogato->id, HTML::ikon("glyphicon glyphicon-remove")." törlés",array('class'=>'confirm btn btn-danger btn-small')); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<p>Nincs feltöltve támogató!</p>
<?php endif ?>