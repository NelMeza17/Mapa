<?php

function Conecta(){
	//Cambiar el Segundo y Tercer parametro segun la contraseña y usuario que se tenga en el servidor
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


define ('SITE', 'http://localhost/Mapa/');
define ('ADMINISTRADOR', SITE.'administrador/');
define ('CSS', SITE.'css/');
define ('JS', SITE.'js/');
define ('IMAGES', SITE.'images/');
define ('USER', SITE.'user/');
define ('LOGOS', IMAGES.'logos/');
//define ('ADMIN', 'root');
define ('ADMIN', 'cm9vdA==');

function sesion_root(){
	@session_start();
	$sesion=false;
	$link = Conecta();
	if (isset ($_SESSION['user']) && isset ($_SESSION['password']) && isset ($_SESSION['root'])){
		if($_SESSION['root'] == ADMIN && base64_encode($_SESSION['user'])==ADMIN){
			$result = mysql_query("select * from user where user='".base64_encode($_SESSION['user'])."' and password='".base64_encode($_SESSION['password'])."'", $link);		
			if ($row = mysql_fetch_object($result)) {
				$sesion=true;
			}
		}	
	}
	return $sesion;
}

function sesion(){
	@session_start();
	$sesion=false;
	$link = Conecta();
	if (isset ($_SESSION['user']) && isset ($_SESSION['password']) && isset ($_SESSION['root'])){
		if($_SESSION['root'] != ADMIN && base64_encode($_SESSION['user'])!=ADMIN){
			$result = mysql_query("select * from user where user='".base64_encode($_SESSION['user'])."' and password='".base64_encode($_SESSION['password'])."'", $link);		
			if ($row = mysql_fetch_object($result)) {
				$sesion=true;
			}
		}	
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
	echo "<span style='color:white'>Hola: ".$_SESSION['user']."</span >
			<span style='color:white'> / </span> 
			<a href='../logout.php'>Cerrar Sesi&oacute;n</a>";
}

function ValidaEspacios($valor){
	$var=trim($valor);
	return $var;	
}

function seguridad_comentarios($texto){
	$anterior = $texto;
	$texto	= stripslashes($texto);
	$texto	= addslashes($texto);
	$texto= str_replace(";","",$texto);
	$texto= str_replace("<","",$texto);
	$texto= str_replace(">","",$texto);
	$texto= str_replace("/","",$texto);
	$texto= str_replace(':',"",$texto);
	$texto= str_replace("(","",$texto);
	$texto= str_replace(")","",$texto);
	$texto= str_replace("'","",$texto);
	if($anterior != $texto){
		return false;
	}
	else{
		return true;	
	}
} 

function inyeccion ($texto){	
	$anterior = $texto;
	$texto= str_replace(";","",$texto);
	$texto= str_replace("<","",$texto);
	$texto= str_replace(">","",$texto);
	$texto= str_replace("/","",$texto);
	$texto= str_replace(':',"",$texto);
	$texto= str_replace("(","",$texto);
	$texto= str_replace(")","",$texto);
	$texto= str_replace("'","",$texto);
	if($anterior != $texto){
		return false;
	}
	else{
		return true;	
	}
}
?>
