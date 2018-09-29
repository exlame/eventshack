<?php

if(file_exists(BASEPATH.'/src/views/tabs/'.$vars['name'].'.php')){
	require(BASEPATH.'/src/views/tabs/'.$vars['name'].'.php');
	
} else {
	echo '404';
}