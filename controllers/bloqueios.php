<?php

require_once("config/conexao.php");

if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	echo "Exception: #".strtoupper( substr( md5(rand()), 0, 20));
	die();
}

$con = $cnt->query("SELECT * FROM config");
$con->execute();


if(isset($_POST['om']) && is_numeric($_POST['om'])){
	
	$om_mil = $_POST['om'];
}

if(isset($_POST['pg']) && is_numeric($_POST['pg'])){
	
	$pg_mil = $_POST['pg'];

}

while($lst = $con->fetch(PDO::FETCH_ASSOC)){

	$om = explode(",", $lst['bloq_cia']);
	$pg = explode(",", $lst['bloq_pg']);

	if(in_array($pg_mil, $pg) || in_array(100, $pg)){
		if(in_array($om_mil, $om) || in_array(100, $om)){
			echo '{"refeicao":"'.$lst['bloq_ref'].'","dias":"'.$lst['bloq_dias'].'", "motivo":"'.$lst['bloq_mot'].'"}';
			die();
		}
	}
}
?>
