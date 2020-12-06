<?php
if($model->id) echo HTML::anchor('/admin/rockfaterkocka/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új szöveg hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor('/admin/rockfaterkocka',  HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához',array('class'=>'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<div class="urlap">
<?php echo Form::open(); ?>
	<div class="form-group">
		<?php $name = 'lang'; ?>
		<?php echo Form::label($name,'Nyelv:'); ?>
		<?php echo Form::select($name, Kohana::$config->load("nyelvek.nyelvek"), $model->$name, array('id'=>$name, 'class'=>'form-control')) ?>
	</div>

	<div class="form-group">
		<?php
		$id = "cim";
		echo Form::label($id, Arr::get($model->labels(), $id));
		echo Form::input($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
		?>
	</div>

	<div class="form-group">
		<?php
		$id = "borgyula";
		echo Form::label($id, Arr::get($model->labels(), $id));
		echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
		?>
	</div>

	<div class="form-group">
		<?php
		$id = "rockfater";
		echo Form::label($id, Arr::get($model->labels(), $id));
		echo Form::textarea($id, $model->$id, array('id' => $id, 'class' => 'form-control'));
		?>
	</div>

	<div>
		<?php echo Form::checkbox("latszik", '1', $model->id ? (bool)$model->latszik : true, array('id'=>'latszik','class'=>'inline')) ?>
		<?php echo Form::label("latszik", "látszik",array('class'=>'inline')) ?>
	</div>

	<div class="form-group">
		<?php echo Form::submit('video_ok','Mentés',array("class"=>"btn btn-primary")); ?>
	</div>
<?php echo Form::close(); ?>
</div>
