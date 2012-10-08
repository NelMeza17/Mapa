<?php
	include 'load/functions.php';	
	$link=Conecta();
	$result=mysql_query("select * from user where usuario='".$_POST['user']."' and password='".$_POST['password']."'",$link);
	//echo "Abuelito ahi vamos!!";
	if($row=mysql_fetch_object($result)){
			session_start();
			$_SESSION['login']=$_POST['user'];
			$_SESSION['pass']=$_POST['password'];
			$_SESSION['welcome']='1';
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
