<?php foreach($hirek as $n=>$hir):
	echo View::factory('hirek/listaelem', array('hir'=>$hir, 'n'=>$n));
endforeach;  ?>

<?php if($lapozo->next_page): ?>
<div class="text-center">
	<a href="<?php echo $lapozo->url($lapozo->next_page) ?>" class="btn btn-danger megtobbhir">Még több hírt</a>
</div>
<?php endif ?>
