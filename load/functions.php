<?php
define ('SITE', 'http://localhost/Mapa/');
define ('ADMINISTRADOR', SITE.'administrador/');
define ('CSS', SITE.'css/');
define ('JS', SITE.'js/');
define ('IMAGES', SITE.'images/');
define ('USER', SITE.'user/');
define ('LOGOS', IMAGES.'logos/');
define ('ADMIN', 'root');
	
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

function sesion_root(){
	@session_start();
	$sesion=false;
	$link = Conecta();
	if (isset ($_SESSION['user']) && isset ($_SESSION['password']) && isset ($_SESSION['root'])){
		if($_SESSION['root'] == ADMIN){
			$result = mysql_query("select * from user where user='".$_SESSION['user']."' and password='".$_SESSION['password']."'", $link);		
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
		if($_SESSION['root'] != ADMIN){
			$result = mysql_query("select * from user where user='".$_SESSION['user']."' and password='".$_SESSION['password']."'", $link);		
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
	echo "<span style='color:white'>Hola: ".$_SESSION['user']."</span ><span style='color:white'> / </span> <a href='../logout.php'>Cerrar Sesion</a>";
}
?>
