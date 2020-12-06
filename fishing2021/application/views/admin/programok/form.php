<?php 
if($program->id) echo HTML::anchor('/admin/programok/szerkeszt', HTML::ikon("glyphicon glyphicon-plus").' Új program hozzáadása', array('class' => 'btn btn-success pull-right', 'style'=>'margin-left: 1em'));
echo HTML::anchor("/admin/programok", HTML::ikon("glyphicon glyphicon-arrow-left").' Vissza a listához',array('class'=>'btn btn-primary pull-right'));
?>
<div class="clearfix"></div>
<?php echo Form::open(); ?>

<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo Form::label('datum','Dátum (eleje):'); ?>
			<?php echo Form::input('datum',$program->datum,array('id'=>'datum','class'=>'datepicker form-control')); ?>
		</div>
	</div>
	<div class="col-sm-2">
		<div class="form-group">
			<?php echo Form::label('vege','Dátum (vége):'); ?>
			<?php echo Form::input('vege',$program->vege,array('id'=>'vege','class'=>'datepicker form-control')); ?>
		</div>
	</div>
	<div class="col-sm-8">
		<div class="checkbox">
			<?php echo Form::checkbox('latszik',1,(bool)$program->latszik,array('id'=>'latszik','class'=>'')); ?>
			<?php echo Form::label('latszik','Látszik',array('class'=>'')); ?>
		</div>
		<div class="checkbox">
			<?php echo Form::checkbox('kiemelt',1,(bool)$program->kiemelt,array('id'=>'kiemelt','class'=>'')); ?>
			<?php echo Form::label('kiemelt','Kiemelt program',array('class'=>'')); ?>
		</div>
	</div>
</div>

<?php $f = $forditasok[I18n::lang()] ?>
<div class="form-group">
	<?php echo Form::label('cim_' . $ny, 'Cím:'); ?>
	<?php echo Form::input('cim_' . $ny, $f->cim, array('id' => 'cim_' . $ny, 'class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo Form::label('lead_' . $ny, 'Lead:'); ?>
	<?php echo Form::textarea('lead_' . $ny, $f->lead, array('id' => 'lead_' . $ny, 'class' => 'form-control', 'rows' => 5)); ?>
</div>

<?php if ($program->id != ''): ?>
	<label>Kép feltöltése</label>
	<div class="kepfeltoltes-tarolo">
		<div class="kepfeltoltes"
				data-action="/admin/programok/kepfeltoltes/<?php echo $program->id ?>"
				data-input-update="hash"
				data-error="hiba"
				data-jcrop="1.5714"
		>
				<noscript>
					<p>A fájlfeltöltés használatához javascript engedélyezésére van szükség!</p>
				</noscript>
			</div>
		<div>
			<div id="hiba" class="kephiba alert alert-error"></div>
			<?php echo Html::image($program->get_kep(),array("id"=>"hash_kep")); ?>
			<?php echo Form::hidden('hash',$program->hash,array('id'=>'hash')); ?>
			<?php echo Form::hidden('elozo_kep',$program->hash,array('id'=>'elozo_kep','disabled'=>'disabled')); ?>
		</div>
	</div>
	<input type="hidden" name="kep_c[w]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"w") ?>" id="w">
	<input type="hidden" name="kep_c[h]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"h") ?>" id="h">
	<input type="hidden" name="kep_c[x]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"x") ?>" id="x">
	<input type="hidden" name="kep_c[y]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"y") ?>" id="y">
	<input type="hidden" name="kep_c[x2]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"x2") ?>" id="x2">
	<input type="hidden" name="kep_c[y2]" value="<?php echo Arr::get(Arr::get($_POST,"kep_c"),"y2") ?>" id="y2">
<?php endif ?>

<div class="form-group">
	<?php echo Form::label('leiras_' . $ny, 'Leírás:'); ?>
	<?php echo Form::ckeditor('leiras_' . $ny, $f->leiras, array('id' => 'leiras_' . $ny, 'class' => 'form-control')); ?>
</div>
<br>
<?php /*
<div class="form-group">
	<?php echo Form::label('alt_' . $ny, 'Alt:'); ?>
	<?php echo Form::input('alt_' . $ny, $f->alt, array('id' => 'alt_' . $ny, 'class' => 'form-control')); ?>
</div>
 * 
 */ ?>

<div class="form-group">
	<?php $name = 'galeria_id'; ?>
	<?php echo Form::label($name,'Galéria társítása:'); ?>
	<?php echo Form::select($name.'[]', $galeriak, $program->$name, array('id'=>$name, 'class'=>'form-control')) ?>
</div>

<?php if($program->loaded()): ?>
<div class="form-group">
	<?php $name = 'dokumentumok'; ?>
	<?php echo Form::label($name,'Dokumentumok társítása:'); ?>
	<small class="text-muted text-right">(A CTRL gomb nyomva tartásával lehet több elemet kijelölni)</small>
	<?php echo Form::select($name.'[]', $dokumentumok, $program->dokumentum->find_all()->as_array("id","id"), array('id'=>$name, 'class'=>'form-control','multiple'=>'multiple', 'size'=>10)) ?>
</div>
<?php endif ?>

<div class="form-group">
	<?php echo Form::submit('program_ok', 'Mentés', array("class" => "btn btn-primary")); ?>
</div>

<?php /*
<hr>
<h3>SEO</h3>
<div class="form-group">
	<?php echo Form::label('seotitle_' . $ny, 'seotitle:'); ?>
	<?php echo Form::input('seotitle_' . $ny, $f->seotitle, array('id' => 'seotitle_' . $ny, 'class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo Form::label('seokeywords_' . $ny, 'seokeywords:'); ?>
	<?php echo Form::input('seokeywords_' . $ny, $f->seokeywords, array('id' => 'seokeywords_' . $ny, 'class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo Form::label('seodescription_' . $ny, 'seodescription:'); ?>
	<?php echo Form::input('seodescription_' . $ny, $f->seodescription, array('id' => 'seodescription_' . $ny, 'class' => 'form-control')); ?>
</div>

<div class="clear"></div>
<div class="form-group">
	<?php echo Form::submit('program_ok','Mentés',array("class"=>"btn btn-primary")); ?>
</div>
 */ ?>
<?php echo Form::close(); ?>