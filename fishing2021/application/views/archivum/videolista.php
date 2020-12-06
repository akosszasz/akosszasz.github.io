<div class="archivum-videolista">
	<?php foreach($videok as $video): ?>
	<div class="archivum-video">
		<span class="video-close" role="button"><span>&times;</span></span>
		<?php echo Youtube::embed($video->youtube_id) ?>
		<h2 class="archivum-video-title"><?php echo $video->youtube_title ?></h2>
	</div>
	<?php endforeach ?>
</div>