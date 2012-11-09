<?php
include 'load/functions.php';
$fecha=date("Y-m-d");
if(sesion()){
	if(!ValidaEspacios($_POST['email']) || !ValidaEspacios($_POST['comentario'])){
		Alerta("El Campo o los campos no debe estar Vacios");
		RedireccionJs(USER.'comenta.php');
	}
	else{
		$link=Conecta();
		if(!seguridad_comentarios($_POST['comentario'])){
			Alerta('El comentario contiene caracteres no permitidos!!');
			RedireccionJs(USER.'comenta.php');
		}
		else{
			mysql_query("insert into comentarios values ('null','".base64_encode($_SESSION['user'])."','".base64_encode($_POST['email'])."','".$fecha."','".base64_encode($_POST['comentario'])."')");
			//echo "insert into comentarios values ('null','".$_SESSION['login']."','".$_POST['email']."','".$fecha."','".$_POST['comentario']."')";
			Alerta('Comentario enviado exitosamente !!');
			RedireccionJs(USER.'comenta.php');
		}
	}
}

else if(!sesion()){
	if(!ValidaEspacios($_POST['nombre']) || !ValidaEspacios($_POST['email']) || !ValidaEspacios($_POST['comentario'])){
		Alerta("El Campo o los campos no debe estar Vacios");
		RedireccionJs(SITE.'comenta.php');
	}
	else {
		$link=Conecta();	
		if(!seguridad_comentarios($_POST['comentario'])){
			Alerta('El comentario contiene caracteres no permitidos!!');
			RedireccionJs(SITE.'comenta.php');
		}
		else{
			mysql_query("insert into comentarios values ('null','".base64_encode($_POST['nombre'])."','".base64_encode($_POST['email'])."','".$fecha."','".base64_encode($_POST['comentario'])."')");
			Alerta('Comentario enviado exitosamente !!');
			RedireccionJS(SITE.'comenta.php');
		}
	}
}
else{
	if(sesion() && empty($_POST['comentario']))
		Redireccionauto(USER);
	else
		Redireccionauto(SITE);
}
?>