<div class="clearfix">
	<div class="pull-left text-muted">
		Sorrend módosítása: drag&amp;drop a lista elemein
	</div>
	<?php echo HTML::anchor('/admin/slider/hozzaad', HTML::ikon("glyphicon glyphicon-plus").' Új slider hozzáadása', array('class'=>'btn btn-primary pull-right')); ?>
</div>

<?php if (count($sliders)): ?>
	<table class="admin-tabla rendezheto table table-striped">
		<thead>
			<tr>
				<th>Kép</th>
				<th>Látszik</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody class="rendez" data-action="<?php echo Kohana::$environment==Kohana::PRODUCTION ? '' : Kohana::$base_url.Kohana::$index_file ?>/admin/slider/sorrend">
		<?php foreach ($sliders as $key => $slider): ?>
			<tr id="item_<?php echo $slider->id; ?>">
				<td><?php echo HTML::image($slider->get_kep(), array('class'=>'img-thumbnail', 'style'=>'width: 200px;')) ?></td>
				<td class="text-center"><?php echo $slider->latszik?'<strong class="text-success">igen</strong>':'<strong class="text-danger">nem</strong>' ?></td>
				<td>
					<?php echo HTML::anchor("/admin/slider/szerkeszt/".$slider->id, HTML::ikon("glyphicon glyphicon-edit")." szerkesztés",array('class'=>'btn btn-primary btn-small')); ?>
				</td>
				<td>
					<?php echo HTML::anchor("/admin/slider/torol/".$slider->id, HTML::ikon("glyphicon glyphicon-remove")." törlés",array('class'=>'confirm btn btn-danger btn-small')); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<p>Nincs feltöltve slider!</p>
<?php endif ?>