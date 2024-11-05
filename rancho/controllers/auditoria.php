<?php
error_reporting(0);

date_default_timezone_set('America/Cuiaba');

function auditoria($acao,$registro, $cnt, $usuario)
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$agent= $_SERVER['HTTP_USER_AGENT'];
	$dt_evento = date('Y-m-d H:i');

	$con = $cnt->prepare('INSERT INTO auditoria (id_registro, data_hora, operador, agent, ip, acao) VALUES (:id_registro, :data_hora, :operador, :agent, :ip, :acao)');
	$con->bindValue(':id_registro', $registro, PDO::PARAM_INT);
	$con->bindValue(':data_hora', $dt_evento, PDO::PARAM_STR);
	$con->bindValue(':operador', $usuario, PDO::PARAM_STR);
	$con->bindValue(':agent', $agent, PDO::PARAM_STR);
	$con->bindValue(':ip', $ip, PDO::PARAM_STR);
	$con->bindValue(':acao', $acao, PDO::PARAM_STR);
	$con->execute();

}

?>