<?php echo HTML::anchor("/admin/programok/hozzaadas",HTML::ikon("glyphicon glyphicon-plus")." Új hozzáadása", array('class' =>'btn btn-primary pull-right')); ?>
<div class="clearfix"></div>
<br>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Program neve</th>
			<th>Dátum</th>
			<th class="text-center">Kiemelt</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($programok as $key => $program): ?>
		<tr class="program">
			<td>
				<span><?php echo $program->forditva()->cim ?></span>
			</td>
			<td>
				<time datetime="<?php echo $program->datum ?>"><?php echo Datum::formaz($program->datum) ?></time>
			</td>
			<td class="text-center"><?php if($program->kiemelt): ?> <span class="glyphicon glyphicon-ok text-success"></span><?php else: echo "-"; endif; ?></td>
			<td class="text-right">
				<?php echo HTML::anchor("/admin/programok/szerkesztes/".$program, HTML::ikon("glyphicon glyphicon-edit")." Szerkeszt", array('class'=>'btn btn-sm btn-primary')) ?>
				<?php echo HTML::anchor("/admin/programok/torles/".$program, HTML::ikon("glyphicon glyphicon-remove")." Töröl", array('class'=>'btn btn-sm btn-danger confirm')) ?>
			</td>
		</tr>
	<?php endforeach ?>
	<?php if(!isset($program)): ?>
		<tr>
			<td colspan="3" class="text-center text-muted">(nincs találat)</td>
		</tr>
	<?php endif ?>
	</tbody>
</table>
