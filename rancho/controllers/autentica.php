<?php

error_reporting(0);

session_start();

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	echo "Exception: #".strtoupper( substr( md5(rand()), 0, 20));;
	die();
}

if (isset($_POST['formData']) && !empty($_POST['formData'])) {

	parse_str(base64_decode($_POST['formData']),$dados);

	$usuario =  isset($dados['usuario']) ? $dados['usuario'] : null;
	$senha =  isset($dados['senha']) ? $dados['senha'] : null;

	if($usuario || $senha){

		require_once("../../controllers/config/conexao.php");
		$con = $cnt->prepare('SELECT * FROM usuarios WHERE (usuario = :usuario AND senha = :senha)');
		$con->bindParam(':usuario', $usuario, PDO::PARAM_STR);
		$con->bindParam(':senha', md5($senha));
		$con->execute();
		$total = $con->rowCount();

		if($total){
			$res = $con->fetch(PDO::FETCH_ASSOC);
			$_SESSION['usuario']['id'] = $res['id'];
			$_SESSION['usuario']['login'] = $res['usuario'];
			$_SESSION['usuario']['om'] = $res['om'];
			$_SESSION['usuario']['tipo'] = $res['tipo'];
			echo '{"url":"home.php"}';
		}
		if(!$total){
			echo '{"erro":"<p style=\"font-size:13px;\" class=\"alert alert-danger\">Usuário ou Senha Incorretos <i class=\"fa fa-exclamation\"></i></p>"}';
		}
	}

	if(!$usuario && !$senha){
		echo '{"url":"index.php"}';
	}

}
?>