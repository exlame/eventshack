<?php


function get_cats(){
	$cats = [
			'art'=>'Art',
			'artisanat'=>'Artisanat',
			'auto'=>'Auto',
			'charity'=>'Chatrité',
			'comédie'=>'Comédie',
			'culture'=>'Culture',
			'family'=>'Famille',
			'fashion'=>'Fashion',
			'film'=>'Film',
			'food'=>'Nourriture',
			'family'=>'Famille',
			'health'=>'Santé',
			'hobbies'=>'Hobbie',
			'littérature'=>'Littérature',
			'music'=>'Musique',
			'other'=>'Autre',
			'photo'=>'Photographie',
			'politics'=>'Politique',
			'profess'=>'Professionnel',
			'religion'=>'Religion',
			'sport'=>'Sports',
			'theatre'=>'Théâtre',
			'technology'=>'Technologie',
			'travel'=>'Voyage'
	];
	return $cats;
}
	
	

	
	function display_events ($filters = null, $pos = null){
		$events = get_events($filters,$pos);
		foreach($events as $event){
			card($event);
		}
	}
	
	function display_my_events (){
		$events = get_my_events();
		if($events)
		foreach($events as $event){
			card($event);
		}
	}
	
	function set_session_default(){
		if(!isset($_SESSION['params'])){
			$_SESSION['params'] = array(
					'notif_day' => true,
					'notif_weekend' => false,
					'notif_week' => false,
					'dispo_night' => true,
					'dispo_day' => false,
					'dispo_week' => false,
					'dispo_weekend' => false,
					'distance' => '50'
			);
			
		}
		foreach(get_cats() as $key=>$text){
			if(!isset($_SESSION['params']['cat_'.$key]))
				$_SESSION['params']['cat_'.$key] = true;
		}
	}
	
	function set_config($key, $value){
		$_SESSION['params'][$key] = $value;
		return $_SESSION['params'][$key];
	}

	function limit_text($text, $limit) {
		if (str_word_count($text, 0) > $limit) {
				$words = str_word_count($text, 2);
				$pos = array_keys($words);
				$text = substr($text, 0, $pos[$limit]) . '...';
		}
		return $text;
	}
	
	function format_date($date){
		return strftime ('%A %e %B %Y',strtotime ($date));
	}
	function format_hour($date){
		return strftime ('%k:%M',strtotime ($date));
	}