<?php
	include 'load/functions.php';	
	$link=Conecta();
	$result=mysql_query("select * from user where usuario='".$_POST['log']."' and password='".$_POST['pwd']."'",$link);
	//echo "Abuelito ahi vamos!!";
	if($row=mysql_fetch_object($result)){
			session_start();
			$_SESSION['login']=$_POST['log'];
			$_SESSION['pass']=$_POST['pwd'];
			$_SESSION['welcome']='1';
			echo "<script>window.alert('Bienvenido TCGD');</script>";
			echo "<script type='text/javascript'> 
				   	window.location='dentro.php'; 
				  </script>";	
	}
	else{
		echo "<script>window.alert('Datos de Administrador Incorrectos');</script>";
		echo "<script type='text/javascript'> 
			window.location='index.php'; 
		</script>";
	}
?>
