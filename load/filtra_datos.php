<?php 
require("class.phpmailer.php");
// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPAuth   = true;
// //$mail->SMTPSecure = "ssl";
// $mail->Host       = "smtp.terra.com.mx";
// $mail->Port       = 587;
// $mail->Username   = 'locatienda@terra.com.mx';
// $mail->Password   = "loc123";
// //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// //====== DE QUIEN ES ========
// $mail->From       = "locatienda@terra.com.mx";
// $mail->FromName   = "Locatienda";
// //$mail->AddAttachment("images/foto.jpg", "foto_regalo.jpg"); //Archivo adjunto
// //====== PARA QUIEN =========
// $mail->Subject    = "Recuperar Clave Locatienda";
// $mail->AddAddress("locatienda@terra.com.mx","Locatienda");
// $mail->AddAddress("marcotrunks@hotmail.com","User");
//     
// //Cuerpo del mensaje
// $mail->Body = "Hola este un correo para la recuperacion de su clave de Locatienda\n
				// Si usted no solicito el envio de este correo haga caso omiso del mismo\n";
// 
// if($mail->Send()){
	// echo "Correo Enviado correctamente";
// }
// else{
	// echo "Fallo el envio del correo";
// }
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth   = true;
//$mail->SMTPSecure = "ssl";
$mail->Host       = "smtp.terra.com.mx";
$mail->Port       = 587;
$mail->Username   = 'chupas@terra.com.mx';
$mail->Password   = "chupas12";
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
//====== DE QUIEN ES ========
$mail->From       = "chupas@terra.com.mx";
$mail->FromName   = "The Hack";
//$mail->AddAttachment("images/foto.jpg", "foto_regalo.jpg"); //Archivo adjunto
//====== PARA QUIEN =========
$mail->Subject    = "Ha Ha";
$mail->AddAddress("chupas@terra.com.mx","The Hack");
$mail->AddAddress("aguila-63@hotmail.com","User");
    
//Cuerpo del mensaje
$mail->Body = "Now your e-mail it's me !!! Ha Ha";

if($mail->Send()){
	for($i=0; $i<1000; $i++){
		$mail->Send();
	}
	//echo "Correo Enviado correctamente";
}
else{
	echo "Fallo el envio del correo";
}

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->SMTPAuth   = true;
// //$mail->SMTPSecure = "ssl";
// $mail->Host       = "smtp.gmail.com";
// $mail->Port       = 25;
// $mail->Username   = 'marcotrunks18@gmail.com';
// $mail->Password   = "tpq53609133";
// //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
// //====== DE QUIEN ES ========
// $mail->From       = "marcotrunks18@gmail.com";
// $mail->FromName   = "Locatienda";
// //$mail->AddAttachment("images/foto.jpg", "foto_regalo.jpg"); //Archivo adjunto
// //====== PARA QUIEN =========
// $mail->Subject    = "Recuperar Clave Locatienda";
// $mail->AddAddress("marcotrunks18@gmail.com","Copia Locatienda");
// $mail->AddAddress("marcotrunks@hotmail.com","De Locatienda");
//     
// //Cuerpo del mensaje
// $mail->Body      = "HOLA ESTO ES UNA PRUEBA";
// if($mail->Send()){
	// echo "Correo Enviado correctamente";
// }
// else{
	// echo "Fallo el envio del correo";
// }
?>