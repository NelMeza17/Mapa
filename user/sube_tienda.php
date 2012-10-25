<?php
	include '../load/functions.php';
	if (sesion()) {
		$link=Conecta();
		$nombre_archivo = $_FILES['file']['name'];
		$tipo_archivo = $_FILES['file']['type']; 
		$tamano_archivo = $_FILES['file']['size'];
		$path="../images/logos/";
		if($_POST['editar']=='edita'){
			if (empty($nombre_archivo)){
				mysql_query("UPDATE tienda SET nombre='".$_POST['nombre']."', calle='".$_POST['calle']."', colonia='".$_POST['colonia']."', numero='".$_POST['numero']."', telefono='".$_POST['telefono']."' WHERE idtienda = '".$_POST['id']."' ", $link);
				Alerta("Tienda Editada con Exito");
				RedireccionJs(USER.'maneja_tienda.php');
			}
			else{
				if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 30720))) {
					echo "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif o .jpg o .png de 30 Kb 	máximo";
				} else {
					if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$nombre_archivo)) {
						//mysql_query($link);
						mysql_query("UPDATE tienda SET nombre='".$_POST['nombre']."', calle='".$_POST['calle']."', colonia='".$_POST['colonia']."', numero='".$_POST['numero']."', telefono='".$_POST['telefono']."', imagen='".$nombre_archivo."' WHERE idtienda = '".$_POST['id']."' ", $link);
						Alerta("Tienda Editada con Exito");
						RedireccionJs(USER.'maneja_tienda.php'); 
					}
					else{
						echo "<br />Tienda NO Registrada!!!";
					}
				}
			}
		}
		else{ 
			if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 30720))) {
				echo "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif o .jpg o .png de 30 Kb 	máximo";
			} else {
				if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$nombre_archivo)) {
					//mysql_query($link);
					mysql_query("insert into tienda values ('null', '".$_POST['nombre']."', '".$_POST['calle']."', '".$_POST['colonia']."', '".$_POST['numero']."', '".$_POST['telefono']."', '".$_POST['latitud']."','".$_POST['longitud']."', '".$nombre_archivo."', '".$_POST['iduser']."')",$link);
					Redireccionauto(USER); 
				}
				else{
					echo "<br />Tienda NO Registrada!!!";
				}
			}
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>