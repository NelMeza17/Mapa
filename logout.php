<?php
	include 'functions.php';
	if(sesion()) {
		session_destroy();
		header("Location: index.php");
	}
	else {
		Redirecciona('index.php'); 
	}
?>