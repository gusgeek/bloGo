<?php 

	session_start();
	unset($_SESSION['idusuario']); 
	unset($_SESSION['name']);
	unset($_SESSION['level']);

	if (session_destroy()) { echo '1'; }


?>