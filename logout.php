<?php
	include 'load/functions.php';
	if(sesion()) {
		session_destroy();
		Redireccionauto(SITE);
	}
	else if(sesion_root()){
		session_destroy();
		Redireccionauto(SITE);
	}
	else {
		Redirecciona(SITE); 
	}
?>