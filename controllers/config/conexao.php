<?php

$options 	= array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 

$uRancho = "root";
$pRancho = "9BCom9bC#2012!root";

try{
	$cnt = new PDO('mysql:host=sisrancho-mysql;dbname=sisrancho', $uRancho, $pRancho, $options);

}catch(PDOException $e)
{
	throw new PDOException($e);
} 

?>
