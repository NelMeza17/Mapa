<?php
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

function Retornauser(){
	echo "<span style='color:white'>Hola: ".$_SESSION['login']."</span ><span style='color:white'> / </span> <a href='../logout.php'>Cerrar Sesion</a>";
}
?>
