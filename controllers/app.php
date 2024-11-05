<?php

class App
{

	function __construct()
	{
		global $usuario_logado;
		$pasta = isset( $_GET['pasta'] ) ? $_GET['pasta'] : null;
		$pagina = isset( $_GET['pagina'] ) ? $_GET['pagina'] : null;
		
		include "inc/header.php";
		
		if(is_file("views/".$pasta."/".$pagina.".php") && is_numeric($usuario_logado['id']))
		{
			include "inc/skeleton.php";
			include "views/".$pasta."/".$pagina.".php";
		}else{
			include "views/index.php";
		}
		include "inc/footer.php";
		
	}

}


?>
