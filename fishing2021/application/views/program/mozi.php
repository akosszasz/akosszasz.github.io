<?php echo $aloldal_menu ?>

<article>
	<?php if($szoveg->loaded()): ?>
		<div class="program-szoveg">
			<?php echo $szoveg->szoveg ?>
		</div>
	<?php endif ?>
</article>

<?php if($jegyek): ?>
	<section>
		<header>
			<h1>Jegyek</h1>
		</header>

		<?php echo View::factory("jegy/jegydoboz", array("jegyek"=>$jegyek)) ?>
	</section>
<?php endif ?>