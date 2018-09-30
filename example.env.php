<?php
use Medoo\Medoo;
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'eventshack',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
		'charset' => 'utf8'
]);