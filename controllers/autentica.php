<?php

error_reporting(0);

session_start();

$identidade = isset($_POST['identidade']) ? $_POST['identidade'] : null;

if($identidade){
	
	require_once("config/conexao.php");
	$con = $cnt->prepare('SELECT * FROM cad_militar WHERE ident_militar = :identidade');
	$con->bindValue(':identidade', $identidade, PDO::PARAM_STR);
	$con->execute();
	$total = $con->rowCount();

	if($total){
		$res = $con->fetch(PDO::FETCH_ASSOC);
		$_SESSION['auth']['usuario_logado'] = $res;
		$_SESSION['auth']['usuario_logado']['id'] = $res['id'];
		echo '{"url":"index.php?pasta=home&pagina=inicio"}';		
	}

	if(!$total){
		echo '{"erro":"<p class=\"alert alert-danger\">Número de CPF não encontrado <i class=\"fa fa-exclamation\"></i></p>"}';
	}
}


?>
