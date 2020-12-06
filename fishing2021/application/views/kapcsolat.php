<div class="container">
	<header>
		<h1><?php echo __('Kapcsolat') ?></h1>
	</header>

	<div class="row">
		<div class="col-md-6">
			<article>
				<?php echo $szoveg->szoveg ?>
			</article>
		</div>
		<div class="col-md-6">
			<?php
			echo Session::instance()->get_once('level_result');
			echo Form::open(null, array('class' => 'form', 'role' => 'form'));
			?>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<?php
							$id = 'nev';
							$label = __('Név');
							echo Form::label($id, $label, array('class'=>'sr-only'));
							echo Form::input($id, Arr::get($_POST, $id), array('id'=>$id, 'class'=>'form-control input-lg', 'placeholder' => $label));
							?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<?php
						$id = 'email';
						$label = __('Email cím');
						echo Form::label($id, $label, array('class'=>'sr-only'));
						echo Form::input($id, Arr::get($_POST, $id), array('id'=>$id, 'class'=>'form-control input-lg', 'placeholder' => $label));
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
						<?php
						$id = 'telefon';
						$label = __('Telefonszám');
						echo Form::label($id, $label, array('class'=>'sr-only'));
						echo Form::input($id, Arr::get($_POST, $id), array('id'=>$id, 'class'=>'form-control input-lg', 'placeholder' => $label));
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 form-group">
					<?php
					$id = 'uzenet';
					$label = __('Üzenet');
					echo Form::label($id, $label, array('class'=>'sr-only'));
					echo Form::textarea($id, Arr::get($_POST, $id), array('id'=>$id, 'class'=>'form-control input-lg', 'placeholder' => $label));
					?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group captcha">
						<?php
						$id = 'captcha';
						$label = __('Ellenőrzőkód');
						echo Form::label($id, $label, array('class'=>'sr-only'));
						echo Form::input($id, Arr::get($_POST, $id), array('id'=>$id, 'class'=>'form-control input-lg', 'placeholder' => $label));
						?>
					</div>
					<div class="col-md-6 captchadiv">
						<div class="img pull-left"><?php echo $captcha->render(); ?></div>
						&nbsp;<a href="#" class="refresh" title="<?php echo __('új kódot kérek!') ?>"><span class="glyphicon glyphicon-refresh"></span></a>
					</div>
				</div>
				<div class="submit">
				  <input type="submit" class="btn btn-primary" name="btnSubmit" value="<?php echo __('Küldés') ?>" />
				</div>
			<?php echo Form::close() ?>
		</div>
	</div>
</div>

<section class="map">
	<?php echo View::factory('elemek/terkep') ?>
</section>
