<?php
error_reporting(0);
session_start();
session_destroy();		
session_unset();
header("Location: index.php?pasta=home&pagina=inicio");
?>