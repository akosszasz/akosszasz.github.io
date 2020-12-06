<?php
if($video->id) echo HTML::anchor('/admin/video/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új videó hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor('/admin/video',  HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához',array('class'=>'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<div class="urlap">
<?php echo Form::open(); ?>
	<div class="form-group">
		<?php $name = 'lang'; ?>
		<?php echo Form::label($name,'Nyelv:'); ?>
		<?php echo Form::select($name, Kohana::$config->load("nyelvek.nyelvek"), $video->$name, array('id'=>$name, 'class'=>'form-control')) ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('cim','Cím'); ?>
		<?php echo Form::input('cim',$video->cim,array('id'=>'cim','class'=>'form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('datum', 'Dátum:'); ?>
		<?php echo Form::input('datum', $video->datum, array('id' => 'datum', 'class' => 'datepicker form-control')); ?>
	</div>
	<div class="form-group">
		<?php echo Form::label('youtube_id','Youtube ID'); ?>
		<div class="media">
			<div class="media-object pull-left" style="line-height: 34px">http://www.youtube.com/watch?v=</div>
			<div class="media-body">
				<?php echo Form::input('youtube_id',$video->youtube_id,array('id'=>'youtube_id','class'=>'form-control')); ?>
			</div>
		</div>
	</div>
	<div class="text-center">
		<?php if($video->loaded()):
			echo Youtube::iframe($video->youtube_id, 640, 360, false, true);
		endif ?>
	</div>
	<div class="form-group">
		<?php echo Form::submit('video_ok','Mentés',array("class"=>"btn btn-primary")); ?>
	</div>
<?php echo Form::close(); ?>
</div>
