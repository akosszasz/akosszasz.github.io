<article class="container">

	<div class="flex flex-wrap flex-justify-center">

		<?php foreach($tamogatok as $n=>$tamogato):

			if($tamogato->tipus!="tamogato") continue;

			?>

			<div class="tamogato" style="margin: 2em">

				<a href="<?php echo $tamogato->url ? $tamogato->url : "javascript:;" ?>" target="_blank" title="<?php echo htmlspecialchars($tamogato->nev) ?>">

					<?php echo HTML::image($tamogato->get_kep(), array("alt"=>$tamogato->nev, "class"=>"img-responsive center-block", "style"=>"max-width: 116px;")) ?>

				</a>

			</div>

		<?php endforeach ?>

	</div>



	<br>



	<h2 class="text-center">Partnerek</h2>



	<div class="flex flex-wrap flex-justify-center">

		<?php foreach($tamogatok as $n=>$tamogato):

			if($tamogato->tipus!="partner") continue;

			?>

			<div class="tamogato" style="margin: 2em">

				<a href="<?php echo $tamogato->url ? $tamogato->url : "javascript:;" ?>" target="_blank" title="<?php echo htmlspecialchars($tamogato->nev) ?>">

					<?php echo HTML::image($tamogato->get_kep(), array("alt"=>$tamogato->nev, "class"=>"img-responsive center-block", "style"=>"max-width: 116px;")) ?>

				</a>

			</div>

		<?php endforeach ?>

	</div>



	<hr>



	<strong>

		<?php //echo HTML::anchor('media/pdf/biztonsagi-terv-foo-2018.pdf', 'Fishing on Orfű - Biztonsági terv 2018', null, null, false) ?>

		<br>

		<?php echo HTML::anchor('media/pdf/szakmai_beszamolo_2019.pdf', 'NKA szakmai beszámoló 2019', null, null, false) ?>

		<br>

		<?php echo HTML::anchor('media/pdf/szakmai_beszamolo_2018.pdf', 'NKA szakmai beszámoló 2018', null, null, false) ?>

	</strong>



</article>