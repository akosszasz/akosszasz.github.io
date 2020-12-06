<p class="nemzene-subtitle">A Fishing minden 'nemzenei' programja.<br>Off-programok, színház, gyerekprogramok - és minden más.</p>
<?php echo $aloldal_menu ?>

<div class="container">
	<?php if(isset($szoveg) and $szoveg->loaded()): ?>
		<article class="szoveg">
			<?php if($szoveg->loaded()) echo $szoveg->szoveg ?>
		</article>
		<hr>
	<?php endif ?>
	<section class="hirek-lista-grid lista-grid">
		<?php foreach($lista as $n=>$model):
			echo View::factory('nemzene/listaelem', array('model'=>$model, 'n'=>$n));
		endforeach;  ?>
	</section>
</div>