<?php

function card($data){ ?>
		<div class="col s12 m6 l3">
			<div class="card" data-id="<?= $data['id'] ?>">
				<div class="card-image">
					<img src="<?= $data['image'] ?>">
					
<a class="<?php if(isset($_SESSION['favorite']) && array_search($data['id'],$_SESSION['favorite'])>-1) { ?>added <?php } ?>btn-floating btn_favorite halfway-fab waves-effect waves-light"><i class="material-icons">favorite</i></a>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"><?= limit_text($data['name'], 10) ?><i class="material-icons right">more_vert</i></span>
					<p class="card-hour"><?= format_hour($data['start_time']) ?></p>
					<p class="card-date"><?= ucfirst(format_date($data['start_time'])) ?></p>
					<p class="card-address"><?= $data['lieu'] ?>, <?= $data['ville'] ?></p>
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?= $data['name'] ?><i class="material-icons right">close</i></span>
					
					<p><?= $data['description'] ?></p>
					<p class="card-hour"><?= format_hour($data['start_time']) ?></p>
					<p class="card-date"><?= ucfirst(format_date($data['start_time'])) ?></p>
					<p class="card-address"><?= $data['lieu'] ?>, <?= $data['ville'] ?></p>
					<?php foreach (explode(' ',str_replace('& ','',$data['categorie'])) as $cat) { ?>
							<span class="badge cat"><?= $cat ?></span>
						<?php } ?>
				</div>
				<div class="card-action">
					<a href="<?= $data['href'] ?>">
						<?php if($data['source'] == 'facebook'){ ?>
							Événement <i class="fab fa-facebook-square"></i>
						<?php } ?>
						<?php if($data['source'] == 'Event Brite'){ ?>
							eventbrite <i class="fas fa-external-link-alt"></i>
						<?php } ?>
					</a>
					<?php foreach (explode(' ',str_replace('& ','',$data['categorie'])) as $cat) { ?>
							<span class="badge cat"><?= $cat ?></span>
						<?php } ?>
				</div>
			</div>
		</div>
	<?php }
	
		
function set_input($name){ 
		$params = $_SESSION['params'];
		?>
<input<?php if($params[$name]) { ?> checked<?php } ?> name="<?= $name ?>" type="checkbox">
	<?php }
	
	function set_option_cat($name, $text){ 
		$params = $_SESSION['params'];
		?>
		 <option<?php if($params[$name]) { ?> selected<?php } ?> value="<?= $name ?>"><?= $text ?></option>
			<?php }
	function set_option($name, $value, $text){ 
		$params = $_SESSION['params'];
		?>
		 <option<?php if($params[$name] == $value) { ?> selected<?php } ?> value="<?= $value ?>"><?= $text ?></option>
			<?php }	
	
	
