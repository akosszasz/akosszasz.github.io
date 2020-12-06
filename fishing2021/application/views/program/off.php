<?php echo $aloldal_menu ?>

<?php if($szoveg->loaded()): ?>
	<article>
		<div class="program-szoveg">
			<?php echo $szoveg->szoveg ?>
		</div>
	</article>
	<hr>
<?php endif ?>

<section>
	<header>
		<?php foreach($programok as $program):
			echo HTML::anchor($program->get_link(), $program->cim, array("class" => "section-text-anchor")).'<br>';
		endforeach; ?>
	</header>

	<hr>

	<?php foreach($programok as $program): ?>
		<article id="<?php echo $program->link ?>">
			<header>
				<h1 class="text-uppercase"><?php echo $program->cim ?></h1>
			</header>

			<?php echo $program->szoveg ?>

			<?php
			$jegyek = $program->jegy->latszik()->find_all();

			if(count($jegyek)) echo View::factory("jegy/jegydoboz", array("jegyek"=>$jegyek));
			?>

			<br>

			<a href="#top" class="section-text-anchor">
				<span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span> Az oldal tetejére
			</a>
		</article>
	<?php endforeach; ?>

</section>

<?php /* if(count($jegyek)): ?>
	<section>
		<header>
			<h1>Jegyek</h1>
		</header>

		<?php echo View::factory("jegy/jegydoboz", array("jegyek"=>$jegyek)) ?>
	</section>
<?php endif */ ?>