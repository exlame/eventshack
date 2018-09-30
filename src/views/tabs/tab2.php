<?php 
	function set_option_cat($name, $text){ 
		$params = $_SESSION['params'];
		?>
		 <option<?php if($params[$name]) { ?> selected<?php } ?> value="<?= $name ?>"><?= $text ?></option>
			<?php }
	function set_option($name, $text){ 
		$params = $_SESSION['params'];
		?>
		 <option<?php if($params[$name]) { ?> selected<?php } ?> value="<?= $name ?>"><?= $text ?></option>
			<?php }
?>


<h2>Filtrer</h2>
<div class="filtres">
	<form>
	<div class="input-field col s12">
    <select id="when" name="when">
      <option value="1" selected>Aujourd'hui</option>
      <option value="2">Demain</option>
      <option value="3">Bientôt</option>
    </select>
  </div>
	<div class="input-field col s12">
    <select id="cat" multiple name="cat[]">
			<?php set_option_cat('cat_art', 'Art') ?>
			<?php set_option_cat('cat_musique', 'Musique') ?>
			<?php set_option_cat('cat_theatre', 'Théâtre') ?>
			<?php set_option_cat('cat_humour', 'Humour') ?>
    </select>
  </div>
	<div class="input-field col s12">
    <select id="distance" name="distance">
			<?php set_option_cat('cat_art', 'Art') ?>
      <option value="10">10</option>
      <option value="50" selected>50</option>
      <option value="100">100</option>
    </select>
  </div>
	</form>
</div>




<div class="ajax_content">
	<div class="row">
		<?php //display_events() ?>
	</div>
</div>