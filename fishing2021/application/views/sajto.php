<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<article class="szoveg">
				<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
					<h3 class="text-cyan">Sajtóakkreditáció</h3>
				</header>

				<?php echo $sajtoakkreditacio->szoveg ?>
			</article>

			<aside>
				<?php
				if(time()<mktime(0,0,0,6,7,2020)):
					echo Form::open(null, array('method'=>'post'));

					$idk = array(
						'medium_nev',
						'medium_www',
						'medium_cim',
						'medium_postacim',
						'foszerkeszto_nev',
						'foszerkeszto_telefon',
						'foszerkeszto_email');

					foreach($idk as $id): ?>
					<div class="form-group">
						<?php
						echo Form::label($id, $model->labels($id).':');
						echo Form::input($id, Arr::get($_POST, $id), array('id' => $id, 'class' => 'form-control'));
						?>
					</div>
					<?php endforeach ?>

					<br>

					<h5 class="text-cyan font-18 font-weight-700">A Fishing on Orfű fesztivállal kapcsolatos eddigi legfontosabb megjelenések összegzése:</h5>

					<p>Offline megjelenés esetén kérjük a tartalmat az bármilyen felületre feltölteni, és az elérési linket megadni!</p>

					<div class="form-group">
						<?php
						$id = 'linkek';
						echo Form::label($id, $model->labels($id).':');
						echo Form::textarea($id, Arr::get($_POST, $id), array('id' => $id, 'class' => 'form-control', 'rows'=>5));
						?>
					</div>

					<br>

					<h5 class="text-cyan font-18 font-weight-700">Az akkreditálni kívánt munkatárs adatai:</h5>

					<p>!!! Minden munkatársat KÜLÖN kell akkreditálni !!! Ha egy akkreditációban több személyt adsz meg, azt automatikusan figyelmen kívül hagyjuk!</p>

					<?php
					$idk = array(
						'munkatars_nev',
						'munkatars_cim',
						'munkatars_postacim',
						'munkatars_telefon',
						'munkatars_email');

					foreach($idk as $id): ?>
						<div class="form-group">
							<?php
							echo Form::label($id, $model->labels($id).':');
							echo Form::input($id, Arr::get($_POST, $id), array('id' => $id, 'class' => 'form-control'));
							?>
						</div>
					<?php endforeach ?>

					<div class="form-group">
						<label>Tevékenysége:</label>

						<?php
						$id = 'munkatars_tevekenyseg';
						foreach(array('újságíró','fotós','operatőr') as $n=>$opcio): ?>
							<div>
							<?php
							echo Form::radio($id, $opcio, (bool)Arr::get($_POST, 'id')==$opcio, array('id' => $id.$n, 'class' => 'form-control'));
							echo Form::label($id.$n, $opcio, array());
							?>
							</div>
						<?php endforeach ?>
						<div>
							<?php
							$opcio = 'egyéb';
							echo Form::radio($id, $opcio, (bool)Arr::get($_POST, 'id')==$opcio, array('id' => $id.$n+1, 'class' => 'form-control'));
							?>
							<label for="<?php echo $id.$n+1 ?>" class="flex">
								<span>egyéb:</span>
								<?php
								//echo Form::label($id.$n, $opcio.':', array());
								$id = 'munkatars_tevekenyseg_egyeb';
								echo Form::input($id, Arr::get($_POST, $id), array('id' => $id, 'class' => 'form-control flex-grow-1'));
								?>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label>A Fishing on Orfű Fesztiválon készített anyagokkal (fénykép, mozgókép) kereskedelmi tevékenységet végzek:</label>
						<?php
						$id = 'kereskedelmi_tevekenyseg';
						foreach(array('igen','nem') as $n=>$opcio): ?>
							<div>
								<?php
								echo Form::radio($id, $opcio, (bool)Arr::get($_POST, 'id')==$opcio, array('id' => $id.$n, 'class' => 'form-control'));
								echo Form::label($id.$n, $opcio, array());
								?>
							</div>
						<?php endforeach ?>
					</div>

					<div class="form-group">
						<label>A Fishing on Orfű Fesztivál melyik napjáról kívánsz tudósítani:</label>
						<?php
						$id = 'fesztivalnapok';
						$n=0;
						foreach(array(
									'06.17.'=>'június 17. szerda',
									'06.18.'=>'június 18. csütörtök',
									'06.19.'=>'június 19. péntek',
									'06.20.'=>'június 20. szombat') as $val=>$opcio):
							$n++;
							?>
							<div>
								<?php
								echo Form::checkbox($id.'[]', $val, (bool)Arr::get($_POST, 'id')==$val, array('id' => $id.$n, 'class' => 'form-control'));
								echo Form::label($id.$n, $opcio, array());
								?>
							</div>
						<?php endforeach ?>
					</div>

					<br>

					<?php
					$id = 'megjegyzes';
					echo Form::label($id, 'Szöveges hozzáfűznivaló az akkreditációs kérelemhez:');
					?>

					<p>Ne itt add hozzá szövegesen kollegád kérelmét. Minden akkreditálandó személyt külön regisztrálj! Ha egy akkreditációban adsz meg több személyt, azt automatikusan figyelmen kívül hagyjuk!</p>

					<div class="form-group">
						<?php
						echo Form::input($id, Arr::get($_POST, $id), array('id' => $id, 'class' => 'form-control'));
						?>
					</div>

				<br>

					<div class="form-group">
						<button type="submit" class="btn btn-lg btn-danger">Elküldés</button>
					</div>
				<?php echo Form::close();
				else: ?>
					<br>
					<p><strong>A sajtóakkreditáció lezárult, köszönjük!</strong></p>
					<br>
				<?php endif; ?>
			</aside>
		</div>
		<div class="col-sm-4">
			<article class="szoveg">
				<header>
					<h3 class="text-cyan">Sajtófotók</h3>
				</header>

				<div class="row">
				<?php foreach($kepek as $kep): ?>
					<div class="col-sm-6">
						<?php
						echo HTML::anchor(
								$kep->get_kep(),
								HTML::image($kep->get_kiskep(), array("alt"=>htmlspecialchars($kep->leiras), "class"=>"img-responsive")),
								array('target'=>'_blank', 'class'=>'sajtofoto-link'),
								null,
								false
						) ?>
					</div>
					<?php /*
					<div class="col-sm-9">
						<h3><?php echo $kep->leiras ?></h3>
						<?php echo HTML::anchor($kep->get_kep(), '<span class="glyphicon glyphicon-new-window"></span> Megnyitás', array('class'=>'btn btn-primary', 'target'=>'_blank'), null, false) ?>
					</div>
					*/ ?>
				<?php endforeach ?>
				</div>
			</article>
		</div>
		<div class="col-sm-4">
			<article class="szoveg">
				<header>
					<h3 class="text-cyan">Sajtóközlemények</h3>
				</header>

				<?php echo $sajtokozlemenyek->szoveg ?>
			</article>

		</div>
	</div>
</div>