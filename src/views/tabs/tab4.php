<h2>Notifications</h2>
<div class="container">
	<div class="switch">
		 <label>
			 Événements du jour
			 <?php set_input('notif_day') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Événements du weekend
			 <?php set_input('notif_weekend') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Événements de la semaine
			 <?php set_input('notif_week') ?>
			 <span class="lever"></span>
		 </label>
  </div>
</div>


<h2>Ce que j'<i class="material-icons">favorite</i></h2>
<div class="container">
	<?php 
		foreach(get_cats() as $key=>$text){ ?>
			<div class="switch">
				<label>
						<?= $text ?>
					<?php set_input('cat_'.$key) ?>
					<span class="lever"></span>
				</label>
			</div>
	
	<?php 	}
	?>
</div>

<h2>Mes disponibilités</h2>
<div class="container">
	<div class="switch">
		 <label>
			 Soir
			 <?php set_input('dispo_night') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Jour
			 <?php set_input('dispo_day') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Semaine
			 <?php set_input('dispo_week') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Weekend
			 <?php set_input('dispo_weekend') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	</div>
	
<h2>Distance</h2>
<div class="container">
	<div class="input-field col s12">
    <select id="distance" name="distance">
			<?php set_option('distance', '5', '5') ?>
			<?php set_option('distance', '10', '10') ?>
			<?php set_option('distance', '50', '50') ?>
			<?php set_option('distance', '100', '100') ?>
			<?php set_option('distance', '1000000', '1000000') ?>
    </select>
  
	</div>
</div>
