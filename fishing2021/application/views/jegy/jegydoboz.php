<?php
$elozo_altipus = null;
$uj_section = false;
foreach($jegyek as $n=>$jegy):
	$uj_section = ($jegy->altipus->loaded() and $jegy->altipus->nev!=$elozo_altipus);

	if($n==0 or $uj_section):
		if($n > 0){ ?></section><?php } ?>

		<section class="row jegytipus-container">
	<?php
	endif;
	if($uj_section): ?>
			<header class="col-sm-12"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<h1><?php echo $jegy->altipus->nev ?></h1>
			</header>
	<?php endif ?>
		<div class="col-sm-4 jegy<?php if($jegy->elfogyott) echo ' elfogyott' ?> flex-column flex-row-sm">
			<div class="jegy-ticket">
				<h2 class="jegy-nev"><?php echo $jegy->nev ?></h2>
				<p class="jegy-ar"><?php echo $jegy->ar ?></p>
			</div>

			<div>
				<?php if($jegy->leiras): ?>
					<p class="jegy-leiras"><?php echo $jegy->leiras ?></p>
				<?php endif ?>

				<?php if(!$jegy->elfogyott):
					echo HTML::anchor($jegy->link, "Jegyvásárlás", array("target" => "_blank", "class" => "btn jegy-btn"));
				else: ?>
					<div class="jegy-elfogyott-label">Elfogyott</div>
				<?php endif ?>
			</div>
		</div>
		<?php if($n%3==2): ?>
			<div class="clearfix visible-sm visible-md visible-lg"></div>
		<?php endif; ?>
	<?php if($n+1==count($jegyek)): ?>
		</section>
	<?php endif ?>
<?php
	if($uj_section) $elozo_altipus = $jegy->altipus->nev;
endforeach; ?>