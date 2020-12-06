<?php echo $aloldal_menu ?>

<article class="container">
	<?php foreach($kepek as $kep): ?>
		<div class="row">
			<div class="col-sm-3">
				<?php
				echo HTML::anchor(
					$kep->get_kep(),
					HTML::image($kep->get_kiskep(), array("alt"=>htmlspecialchars($kep->leiras), "class"=>"img-responsive")),
					array('target'=>'_blank'),
					null,
					false
				) ?>
			</div>
			<div class="col-sm-9">
				<h3><?php echo $kep->leiras ?></h3>
				<?php echo HTML::anchor($kep->get_kep(), '<span class="glyphicon glyphicon-new-window"></span> Megnyitás', array('class'=>'btn btn-primary', 'target'=>'_blank'), null, false) ?>
			</div>
		</div>
		<br>
	<?php endforeach ?>
</article>