<?php
session_start();
error_reporting(0);

include "../../controllers/config/conexao.php";
include "auditoria.php";

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	echo "Exception: #".strtoupper( substr( md5(rand()), 0, 20));;
	die();
}

$refeicao = isset($_POST['refeicao']) ? $_POST['refeicao'] : null;

$data = str_replace('/', '-', $_POST['dias']);
$dt = date("Y-m-d", strtotime($data));

if(!$_POST['militares']){
	echo '{"error":"Selecione algum militar!"}';
	die();
}

if(!$_POST['dias']){
	echo '{"error":"Selecione alguma data!"}';
	die();
}

if(!$refeicao){
	echo '{"error":"Selecione alguma refeicao!"}';
	die();
}

if($dt <= date('Y-m-d')){
	echo '{"error":"Data não autorizada!"}';
	die();
}


if(in_array(1, $refeicao)){

	foreach ($_POST['militares'] as $militar) {

		$con = $cnt->prepare("SELECT data,tp FROM registros WHERE ident_militar = :militar AND tp = :refeicao AND data = :dt");
		$con->bindValue(':refeicao', 1, PDO::PARAM_INT);
		$con->bindValue(':dt', $dt, PDO::PARAM_STR);
		$con->bindValue(':militar', $militar, PDO::PARAM_STR);
		$con->execute();
		$total = $con->rowCount();

		if(!$total){
			$con = $cnt->prepare('INSERT INTO registros (data, tp, ident_militar) VALUES (:dt, :refeicao, :militar)');
			$con->bindValue(':refeicao', 1, PDO::PARAM_INT);
			$con->bindValue(':dt', $dt, PDO::PARAM_STR);
			$con->bindValue(':militar', $militar, PDO::PARAM_STR);
			$con->execute();
			if($con){
				$registro = $cnt->lastInsertId();
				auditoria("ARRANCHAR", $registro, $cnt, $_SESSION['usuario']['id']);
			}
		}
	}
}
if(in_array(2, $refeicao)){

	foreach ($_POST['militares'] as $militar) {
		$con = $cnt->prepare("SELECT data,tp FROM registros WHERE ident_militar = :militar AND tp = :refeicao AND data = :dt");
		$con->bindValue(':refeicao', 2, PDO::PARAM_INT);
		$con->bindValue(':dt', $dt, PDO::PARAM_STR);
		$con->bindValue(':militar', $militar, PDO::PARAM_STR);
		$con->execute();
		$total = $con->rowCount();

		if(!$total){
			$con = $cnt->prepare('INSERT INTO registros (data, tp, ident_militar) VALUES (:dt, :refeicao, :militar)');
			$con->bindValue(':refeicao', 2, PDO::PARAM_INT);
			$con->bindValue(':dt', $dt, PDO::PARAM_STR);
			$con->bindValue(':militar', $militar, PDO::PARAM_STR);
			$con->execute();
			if($con){
				$registro = $cnt->lastInsertId();
				auditoria("ARRANCHAR", $registro, $cnt, $_SESSION['usuario']['id']);
			}
		}
	}
}
if(in_array(3, $refeicao)){

	foreach ($_POST['militares'] as $militar) {
		$con = $cnt->prepare("SELECT data,tp FROM registros WHERE ident_militar = :militar AND tp = :refeicao AND data = :dt");
		$con->bindValue(':refeicao', 3, PDO::PARAM_INT);
		$con->bindValue(':dt', $dt, PDO::PARAM_STR);
		$con->bindValue(':militar', $militar, PDO::PARAM_STR);
		$con->execute();
		$total = $con->rowCount();

		if(!$total){
			$con = $cnt->prepare('INSERT INTO registros (data, tp, ident_militar) VALUES (:dt, :refeicao, :militar)');
			$con->bindValue(':refeicao', 3, PDO::PARAM_INT);
			$con->bindValue(':dt', $dt, PDO::PARAM_STR);
			$con->bindValue(':militar', $militar, PDO::PARAM_STR);
			$con->execute();
			if($con){
				$registro = $cnt->lastInsertId();
				auditoria("ARRANCHAR", $registro, $cnt, $_SESSION['usuario']['id']);
			}
		}
	}
}

echo '{"success":"Arranchamento realizado com sucesso!"}';

?>
