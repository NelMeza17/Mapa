<?php
	include 'load/functions.php';
	if (sesion()) {
		$link=Conecta();
		$coordenadas= $_POST['latitud'].", ".$_POST['longitud'];
		echo $coordenadas;
		$nombre_archivo = $_FILES['file']['name'];
		$tipo_archivo = $_FILES['file']['type']; 
		$tamano_archivo = $_FILES['file']['size']; 
		$path="../images/logos/"; 
		if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 30720))) {
			echo "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif o .jpg o .png de 30 Kb 	máximo";
		} else {
			if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$nombre_archivo)) {
				mysql_query("insert into coordenadas values ('".$coordenadas."','".$_POST['nombre']."','".$nombre_archivo."')",$link);
				header('Location: alta_producto.php?coordenadas='.$coordenandas); 
			}
			else{
				echo "<br />Tienda NO Registrada!!!";
			}
		}
	}
	else {
		Redirecciona('index.php'); 
	}
?>