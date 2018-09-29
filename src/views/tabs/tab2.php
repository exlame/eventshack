<h2>Filtrer</h2>
<div class="filtres">
	<div class="input-field col s12">
    <select>
      <option value="1" selected>Aujourd'hui</option>
      <option value="2">Demain</option>
      <option value="3">Bientôt</option>
    </select>
  </div>
	<div class="input-field col s12">
    <select multiple>
      <option value="1" selected>Musique</option>
      <option value="2">Théâtre</option>
    </select>
  </div>
	<div class="input-field col s12">
    <i class="material-icons prefix">near_me</i>
    <input type="text" id="autocomplete-input" class="autocomplete">
  </div>
</div>





<div class="row">
	<?php display_events() ?>
</div>