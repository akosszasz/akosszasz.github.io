<?php echo HTML::anchor('/admin/sajtoakkreditacio', HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához', array('class' => 'btn btn-primary pull-right')); ?>

<div class="clearfix"></div>

<?php $id = 'datum' ?>
<div class="row">
	<div class="col-md-3">
		<strong>Dátum</strong>
	</div>
	<div class="col-md-9">
		<?php echo $model->$id ?>
	</div>
</div>

<hr>

<?php foreach($model->labels() as $id => $label): ?>
	<div class="row">
		<div class="col-md-3">
			<strong><?php echo $label ?></strong>
		</div>
		<div class="col-md-9">
			<?php if($id=="fesztivalnapok"){
				echo implode('<br>', json_decode($model->$id));
			} else {
				echo $model->$id;
			} ?>
		</div>
	</div>

	<hr>

<?php endforeach; ?>

<hr>

<div class="clearfix"></div>