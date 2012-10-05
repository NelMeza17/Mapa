<?php
	session_start();
	if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
		$link=mysql_connect("localhost","root","root");
		if(!$link){
			echo "Error al conectar con el servidor";
			exit;
		}
		if(!mysql_select_db("desarrollo",$link)){
			echo "Error al conectar con el servidor";
			exit;
		}
		$boolean=1;
		
		$result=mysql_query("select producto from productos where coordenadas='".$_POST['coordenadas']."'",$link);
		while($row=mysql_fetch_object($result)){
			if ($row->producto==$_POST['producto']) {
				$boolean=0;
				echo "<script>alert('Ya esta registrado ese producto');</script>";
				//header("Location: alta_producto.php?coordenadas=".$_POST['coordenadas']);
				echo "
				<script type='text/javascript'>
					window.location='realta_producto.php?coordenadas=".$_POST['coordenadas']."';
				</script>";
			}
		}	
		if ($boolean==1) {	
		$nombre = mysql_query("select nombre from coordenadas where coordenadas='".$_POST['coordenadas']."'", $link);
		if($row=mysql_fetch_object($nombre))
			mysql_query("insert into productos values ('".$_POST['coordenadas']."','".$row->nombre."','".$_POST['producto']."')",$link);
			header("Location: realta_producto.php?coordenadas=".$_POST['coordenadas']);
		}
	}
	else {
		echo "<center><h2>Acceso no permitido !!!</h2></center>";
		header('refresh:2; url=index.php'); 
	}
?>