<?php

error_reporting(0);
session_start();

include "../../controllers/config/conexao.php";

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	echo "Exception: #".strtoupper( substr( md5(rand()), 0, 20));;
	die();
}

$om		= addslashes($_POST['om']);
$posto	= addslashes($_POST['posto']);

$con = $cnt->prepare("SELECT nome_guerra,ident_militar from cad_militar where om_id = '{$om}' AND posto = '{$posto}' order by nome_guerra asc");
$con->execute();
$total = $con->rowCount();


if(!$total){

die('');

}

$retorno = "";

while ($result = $con->fetch(PDO::FETCH_ASSOC)){ 

	$retorno .= "<option value=\"{$result['ident_militar']}\">[{$result['ident_militar']}] {$result['nome_guerra']}</option>";
}

echo $retorno;


?>