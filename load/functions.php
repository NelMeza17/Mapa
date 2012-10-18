<?php

define('ROOT', 'http://localhost/Mapa/');

define('LOAD', ROOT.'load/');
define('HEAD', LOAD.'head.php');
define('PRODUCTOS', LOAD.'consultaproductos.php');

define ('SITE', 'http://localhost/Mapa/');
define ('ADMINISTRADOR', SITE.'administrador/');
define ('CSS', SITE.'css/');
define ('JS', SITE.'js/');
define ('IMAGES', SITE.'images/');
define ('USER', SITE.'user/');
	
function Conecta(){
	$link=mysql_connect("localhost","root","root");
	if(!$link){
		echo "Error al conectar con el servidor";
		exit;
	}
	if(!mysql_select_db("locatienda",$link)){
		echo "Error al conectar con el servidor";
		exit;
	}
	return $link;
}

function sesion(){
	@session_start();
	$sesion=false;		
	if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
		$sesion=true;
	}
	return $sesion;
}

function Redirecciona($direccion){
	header("refresh:2; url='".$direccion."'"); 
    echo "<center><h2>Acceso no permitido !!!</h2></center>";	
}

function Redireccionauto($direccion){
	header("Location: ".$direccion.""); 	
}

function RedireccionJs($direccionjs){
	echo "<script>
			window.location='".$direccionjs."';
		  </script>";
}

function Alerta($mensaje){
	echo "<script>
			window.alert('".$mensaje."');
		</script>";
}

function Retornauser(){
	echo "<span style='color:white'>Hola: ".$_SESSION['login']."</span ><span style='color:white'> / </span> <a href='../logout.php'>Cerrar Sesion</a>";
}
?>
