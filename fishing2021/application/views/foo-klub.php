<article class="container">
	<div class="szoveg text-center">
		<?php echo $szoveg->szoveg ?>
	</div>

	<aside class="container font-14 text-center">
		<h4 class="font-weight-300 text-white"><?php echo HTML::anchor('info/adatvedelem', 'Adatvédelmi tájékoztató') ?></h4>
		<p>Az alábbiakban az adataid megadásával kifejezetten hozzájárulsz ahhoz, hogy a Fishing on Orfűvel kapcsolatos híreket, ajánlatokat küldjünk neked emailben és elfogadod az <?php echo HTML::anchor('info/adatvedelem', 'Adatvédelmi tájékoztatóban') ?> foglaltakat.</p>
	</aside>

	<br>

	<form action="https://almaabonyi.createsend.com/t/i/s/clttkl/" method="post" id="subForm" class="text-center">
		<div class="form-group">
			<label for="fieldvlhjyl">A nevem:</label>
			<input id="fieldvlhjyl" name="cm-f-vlhjyl" type="text" class="form-control input-lg">
		</div>
		<div class="form-group">
			<label for="fieldEmail">Email címem:</label>
			<input id="fieldEmail" name="cm-clttkl-clttkl" type="email" required class="form-control input-lg">
		</div>
		<br>
		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-danger">Feliratkozom, mehet!</button>
		</div>
	</form>
</article>

<br><br>
