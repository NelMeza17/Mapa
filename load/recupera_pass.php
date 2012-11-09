<?php
	include ('functions.php');
	if(!ValidaEspacios($_POST['mail'])){
		echo "El campo no debe estar vacio, ingresa un email valido";
	}
	else {
		$link = Conecta();
		$result = mysql_query("select * from user where email='".base64_encode($_POST['mail'])."'",$link);
		if($count = mysql_num_rows($result)){
			if($row = mysql_fetch_object($result)){
				$usuario = base64_decode($row->user);
				$password = base64_decode($row->password);
				require("class.phpmailer.php");
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPAuth   = true;
				$mail->Host       = "smtp.terra.com.mx";
				$mail->Port       = 587;
				$mail->Username   = 'locatienda@terra.com.mx';
				$mail->Password   = "loc123";
				//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
				//====== DE QUIEN ES ========
				$mail->From       = "locatienda@terra.com.mx";
				$mail->FromName   = "Locatienda";
				//====== PARA QUIEN =========
				$mail->Subject    = "Recuperar Clave Locatienda";
				$mail->AddAddress("locatienda@terra.com.mx","Locatienda");
				$mail->AddAddress($_POST['mail'],$usuario);
				    
				//Cuerpo del mensaje
				$mail->Body = "Hola este un correo para la recuperacion de su clave de Locatienda\n
								Su usuario es: ".$usuario." y su clave es: ".$password."\n
								Si usted no solicito el envio de este correo haga caso omiso del mismo\n
								Gracias !!!!\n\n
								Locatienda, todas nuestras tiendas al alcance de tu ordenador!!!!";
				
				if($mail->Send()){
					echo "Correo Enviado correctamente";
				}
				else{
					echo "Fallo el envio del correo";
				}
			}
		}
		else{
			echo "El email no se encuentra registrado";
		}
	}
?>