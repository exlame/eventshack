<?php 
	$today = $_SESSION['params'];
	$near = $today;
	$near['when'] = 3;
?>



<h2>Évènements du jour</h2>
<div class="row">
	<?php display_events($today,$_GET) ?>
</div>
<h2>Évènements à venir</h2>
<div class="row">
	<?php display_events($near,$_GET) ?>
</div>