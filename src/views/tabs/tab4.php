<?php 
	function set_input($name){ 
		$params = $_SESSION['params'];
		?>
<input<?php if($params[$name]) { ?> checked<?php } ?> name="<?= $name ?>" type="checkbox">
	<?php }
?>

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
	<div class="switch">
		 <label>
			 Art
			 <?php set_input('cat_art') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Musique
			 <?php set_input('cat_musique') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Théâtre
			 <?php set_input('cat_theatre') ?>
			 <span class="lever"></span>
		 </label>
  </div>
	<div class="switch">
		 <label>
			 Humour
			 <?php set_input('cat_humour') ?>
			 <span class="lever"></span>
		 </label>
  </div>
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
