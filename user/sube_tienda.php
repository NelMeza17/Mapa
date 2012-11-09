<?php
	include '../load/functions.php';
	if (sesion()) {
		if(!ValidaEspacios($_POST['nombre']) || !ValidaEspacios($_POST['calle']) || !ValidaEspacios($_POST['numero']) ||  !ValidaEspacios($_POST['colonia']) || !ValidaEspacios($_POST['telefono']) || !ValidaEspacios($_POST['latitud']) || !ValidaEspacios($_POST['longitud'])){
			Alerta("El o los Campos no deben estar Vacios");
			if($_POST['editar']=='edita'){
				RedireccionJs(USER.'maneja_tienda.php');
			}
			else{
				RedireccionJs(USER.'ubica_tienda.php');
			} 
		}
	else {
			$link=Conecta();
			$nombre_archivo = $_FILES['file']['name'];
			$tipo_archivo = $_FILES['file']['type']; 
			$tamano_archivo = $_FILES['file']['size'];
			$path="../images/logos/";
			if($_POST['editar']=='edita'){
				if (empty($nombre_archivo)){
					if(inyeccion($_POST['nombre']) && inyeccion($_POST['calle']) && inyeccion($_POST['colonia']) && inyeccion($_POST['numero']) && inyeccion($_POST['telefono'])){
						mysql_query("UPDATE tienda SET nombre='".base64_encode($_POST['nombre'])."', calle='".base64_encode($_POST['calle'])."', colonia='".base64_encode($_POST['colonia'])."', numero='".base64_encode($_POST['numero'])."', telefono='".base64_encode($_POST['telefono'])."' WHERE idtienda = '".$_POST['id']."' ", $link);
						Alerta("Tienda Editada con Exito");
						RedireccionJs(USER.'maneja_tienda.php');
					}
					else {
						Alerta("Sus datos contiene caracteres invalidos !!");
						RedireccionJs(USER.'maneja_tienda.php');
					}
				}
				else{
					if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 30720))) {
						Alerta("La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif o .jpg o .png de 30 Kb 	máximo");
					} else {
						if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$nombre_archivo)) {
							//mysql_query($link);
							if(inyeccion($_POST['nombre']) && inyeccion($_POST['calle']) && inyeccion($_POST['colonia']) && inyeccion($_POST['numero']) && inyeccion($_POST['telefono'])){
								mysql_query("UPDATE tienda SET nombre='".base64_encode($_POST['nombre'])."', calle='".base64_encode($_POST['calle'])."', colonia='".base64_encode($_POST['colonia'])."', numero='".base64_encode($_POST['numero'])."', telefono='".base64_encode($_POST['telefono'])."', imagen='".base64_encode($nombre_archivo)."' WHERE idtienda = '".$_POST['id']."' ", $link);
								Alerta("Tienda Editada con Exito");
								RedireccionJs(USER.'maneja_tienda.php'); 
							}
							else{
								Alerta("Sus datos contiene caracteres invalidos !!");
								RedireccionJs(USER.'maneja_tienda.php');
							}
						}
						else{
							Alerta("Tienda NO Registrada!!!");
						}
					}
				}
			}
			else{
				if(empty($_FILES['file']['name'])){
					Alerta("El o los Campos no deben estar Vacios");
					RedireccionJs(USER.'ubica_tienda.php');	
				}
				else{
					if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")) && ($tamano_archivo < 30720))) {
						echo "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .gif o .jpg o .png de 30 Kb 	máximo";
					} else {
						if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$nombre_archivo)) {
							//mysql_query($link);
							if(inyeccion($_POST['nombre']) && inyeccion($_POST['calle']) && inyeccion($_POST['colonia']) && inyeccion($_POST['numero']) && inyeccion($_POST['telefono'])){
								mysql_query("insert into tienda values ('null', '".base64_encode($_POST['nombre'])."', '".base64_encode($_POST['calle'])."', '".base64_encode($_POST['colonia'])."', '".base64_encode($_POST['numero'])."', '".base64_encode($_POST['telefono'])."', '".base64_encode($_POST['latitud'])."','".base64_encode($_POST['longitud'])."', '".base64_encode($nombre_archivo)."', '".$_POST['iduser']."')",$link);
								Redireccionauto(USER); 
							}
							else{
								Alerta("Sus datos contiene caracteres invalidos !!");
								RedireccionJs(USER.'ubica_tienda.php');
							}
						}
						else{
							echo "<br />Tienda NO Registrada!!!";
						}
					}
				}
			}
		}
	}
	else {
		Redirecciona(SITE); 
	}
?>