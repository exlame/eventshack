
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
			<?php 
			foreach(get_cats() as $key=>$text){
				set_option_cat('cat_'.$key, $text);
			}
			?>
    </select>
  </div>
	<div class="input-field col s12">
    <select id="distance" name="distance">
			<?php set_option('distance', '5', '5') ?>
			<?php set_option('distance', '10', '10') ?>
			<?php set_option('distance', '50', '50') ?>
			<?php set_option('distance', '100', '100') ?>
			<?php set_option('distance', '1000000', '1000000') ?>
    </select>
  </div>
	</form>
</div>




<div class="ajax_content">
	<div class="row">
		<?php //display_events() ?>
	</div>
</div>