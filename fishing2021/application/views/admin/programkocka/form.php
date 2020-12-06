<?php echo Form::open("") ?>

	<div class="form-group">
		<?php
		$id = "headline1";
		echo Form::label($id, Arr::get($model->labels(), $id));
		echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
		?>
	</div>
<?php /*
	<div class="form-group">
		<?php
		$id = "headline2";
		echo Form::label($id, Arr::get($model->labels(), $id));
		echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
		?>
	</div>
*/ ?>
	<div>
		<p><?php echo Form::submit("submit", "Mentés", array('class'=>'btn btn-primary')) ?></p>
	</div>

<?php echo Form::close() ?>