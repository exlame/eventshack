<?php

$params = [
		'when' => $_GET['when'],
		'dispo_night' => true,
		'dispo_day' => true,
		'dispo_week' => true,
		'dispo_weekend' => true,
		'distance' => 50
];
foreach(get_cats() as $key=>$text){
	$params['cat_'.$key] = false;
}
if(isset($_GET['cat']))
	foreach($_GET['cat'] as $cat){
		$params[$cat] = true;
	}
$params['distance'] = $_GET['distance'];
display_events($params, $_GET);
/*
$_SESSION['params'] = array(
					'notif_day' => true,
					'notif_weekend' => false,
					'notif_week' => false,
					'cat_art' => true,
					'cat_musique' => true,
					'cat_humour' => true,
					'cat_theatre' => true,
					'dispo_night' => true,
					'dispo_day' => false,
					'dispo_week' => false,
					'dispo_weekend' => false
			);

*/