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
		<a href="#fono-zeneudvar-reszletes-program" class="section-text-anchor">Fonó Zeneudvar (Medvehagyma Ház)</a><br>
		<a href="#foo-szinhazkert-reszletes-program" class="section-text-anchor">FOO Színházkert (Muskátli udvar)</a><br>
		<a href="#gyermekbirodalom" class="section-text-anchor">Gyermekbirodalom (Medvehagyma Ház)</a>
	</header>

	<?php echo HTML::image("media/images/2017/foo-2017-orfu-terkep.png", array("alt"=>"Fishing On Orfű 2017 - külső helyszínek térkép", "class" => "img-responsive")) ?>

	<?php /*
</section>

<hr>

<section>
	<header>
		<?php foreach($programok as $program):
			echo HTML::anchor($program->get_link(), $program->cim, array("class" => "section-text-anchor")).'<br>';
		endforeach; ?>
	</header>

 	*/ ?>

	<hr>

	<?php foreach($programok as $program): ?>
		<article id="<?php echo $program->link ?>">
			<header>
				<h1 class="text-uppercase"><?php echo $program->cim ?></h1>
			</header>

			<?php if($program->get_kep()) echo Html::image($program->get_kep(), array("class"=>"img-responsive")).'<br>' ?>

			<?php echo $program->szoveg ?>

			<?php
			$jegyek = $program->jegy->latszik()->find_all();

			if(count($jegyek)) echo View::factory("jegy/jegydoboz", array("jegyek"=>$jegyek));
			?>
			<div class="clearfix"></div>

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