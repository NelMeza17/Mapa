<?php
	include 'load/functions.php';
	if(sesion()) {
		session_destroy();
		Redireccionauto("index.php");
	}
	else {
		Redirecciona('index.php'); 
	}
?>