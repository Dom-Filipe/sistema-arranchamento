<?php

$options 	= array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 

$uRancho = "root";
$pRancho = "password";

try{
	$cnt = new PDO('mysql:host=sisrancho-db;dbname=sisrancho', $uRancho, $pRancho, $options);

}catch(PDOException $e)
{
	throw new PDOException($e);
} 

?>
