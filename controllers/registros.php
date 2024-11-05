<?php
session_start();
require_once("config/conexao.php");
include "../rancho/controllers/auditoria.php";

$identidade = $_SESSION['auth']['usuario_logado']['ident_militar'];

//captura data atual
$newDate =  isset($_POST['data']) ? $_POST['data'] : null;
//captura tipo de arranchamento (cafe, almoco, janta)
$tipo =  isset($_POST['tipo']) ? $_POST['tipo'] : null;

if($newDate && $tipo){

	if($tipo != 1 && $tipo != 2 && $tipo != 3){
		echo '{"error":"Refeição não cadastrada!"}';
		die();
	}

	if($newDate <= date('Y-m-d')){
		echo '{"error":"Data não autorizada!"}';
		die();
	}

	$con = $cnt->prepare("SELECT id,data,tp FROM registros WHERE ident_militar = :identidade AND tp = :tipo AND data = :newDate");
	$con->bindValue(':identidade', $identidade, PDO::PARAM_STR);
	$con->bindValue(':tipo', $tipo, PDO::PARAM_INT);
	$con->bindValue(':newDate', $newDate, PDO::PARAM_STR);
	$con->execute();

	$res = $con->fetch(PDO::FETCH_ASSOC);
	$total = $con->rowCount();

	if($total){
		if($res['data'] == $newDate){
			$con = $cnt->prepare("DELETE FROM registros WHERE ident_militar = :identidade AND tp = :tipo AND data = :newDate");
			$con->bindValue(':identidade', $identidade, PDO::PARAM_STR);
			$con->bindValue(':tipo', $tipo, PDO::PARAM_INT);
			$con->bindValue(':newDate', $newDate, PDO::PARAM_STR);
			$con->execute();
			if($con){
				$registro = $res['id'];
				auditoria("DESARANCHAR", $registro, $cnt, $_SESSION['auth']['usuario_logado']['ident_militar']);
			}
			echo '{"msg":"Arranchamento Desfeito!"}';
			die();
		}
	}

	$con = $cnt->prepare("INSERT INTO registros (data, tp, ident_militar) VALUES (:newDate, :tipo, :identidade)");
	$con->bindValue(':identidade', $identidade, PDO::PARAM_STR);
	$con->bindValue(':tipo', $tipo, PDO::PARAM_INT);
	$con->bindValue(':newDate', $newDate, PDO::PARAM_STR);
	$con->execute();
	if($con){
		$registro = $cnt->lastInsertId();
		auditoria("ARRANCHAR", $registro, $cnt, $_SESSION['auth']['usuario_logado']['ident_militar']);
	}
	echo '{"msg":"Arranchamento Registrado!"}';
	die();
}

if($identidade){
	$con = $cnt->prepare("SELECT id, tp, SUBSTRING_INDEX(GROUP_CONCAT(data ORDER BY data DESC), ',', 30) as data FROM registros WHERE ident_militar = :identidade GROUP BY tp ORDER BY id DESC;");
	$con->bindValue(':identidade', $identidade, PDO::PARAM_STR);
	$con->execute();

	$reg = "";

	while($res = $con->fetch(PDO::FETCH_ASSOC)){
		$reg .= '{"date":"'.$res['data'].'", "tipo": "'.$res['tp'].'"},';
	}

	$reg = substr($reg,0,strlen($reg) - 1);

	echo "[".$reg."]";
}
?>