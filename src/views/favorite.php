<?php
var_dump($vars);

if($vars['action'] == 'add'){
	$_SESSION['favorite'][] = $vars['id'];
} else {
	$key = array_search($vars['id'],$_SESSION['favorite']);
	unset($_SESSION['favorite'][$key]);
}