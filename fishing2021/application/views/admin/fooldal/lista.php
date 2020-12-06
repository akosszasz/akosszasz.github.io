<?php echo Form::open(null, array('class'=>'form-horizontal')) ?>
	<?php foreach($lista as $model): ?>
		<div class="well well-sm" style="background: #efefef;">
			<div class="form-group" style="margin-bottom: 0;">
				<div class="col-sm-10">
					<?php echo Form::input("model[".$model->id."][headline]", $model->headline, array('id' => "headline_".$model->id, 'class' => 'form-control col-sm-10', 'style'=>'font-size:1.2em;')); ?>
				</div>
				<div class="col-sm-2">
					<?php echo Form::checkbox("model[".$model->id."][aktiv]", '1', $model->id ? (bool)$model->aktiv : true, array('id'=>'aktiv_'.$model->id,'class'=>'inline')) ?>
					<?php echo Form::label("aktiv_".$model->id, "látszik",array('class'=>'inline')) ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="form-group">
		<?php echo Form::submit("fooldal_ok", "Mentés", array("class"=>"btn btn-primary")) ?>
	</div>
<?php echo Form::close() ?>
