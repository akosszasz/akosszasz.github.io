<?php echo $aloldal_menu ?>

<section class="container">
<?php if($jegytipus == "1") {?>
<?php echo View::factory("jegy/jegydoboz", array("jegyek"=>$jegyek)) ?>
<?php } else { echo 'Hamarosan!';}?>

<?php if($jegytipus->szoveg): ?>
	<article>
		<?php if($jegytipus->szoveg_cim): ?>
			<header>
				<h1><?php echo $jegytipus->szoveg_cim ?></h1>
			</header>
		<?php endif; ?>

		<?php echo $jegytipus->szoveg ?>
	</article>
<?php endif; ?>
</section>