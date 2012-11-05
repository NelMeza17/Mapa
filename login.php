<?php
	include ('load/functions.php');
	if(!sesion()){
?>
<html>
    <?
    include ('load/head.php');
    ?>
    </head>
    <body>
    	
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
            <h2 style="color: white"><img src="images/locked.png" alt="" />Panel de Usuario</h2>
            <?php if (isset ($_GET['e'])){ ?>
					<div class="notif error bloc">
						<strong>Error :</strong> Usuario y/o Contraseña invalida
						<a href="#" class="close"></a>
					</div>
			<?php } ?>
			<div class="notif tip bloc">
                	<strong>Hola :</strong> Aun no eres miembro de Locatienda? haz click
                	<a href="new_user.php" class="link_notif">Aqui</a>
                	<a href="#" class="close"></a>
            </div>
            <form action="login1.php" method="POST">
                <div class="input">
                    <input type="text" id="login" name='user' placeholder="Usuario" required="required"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass" name="password" placeholder="Contraseña" required="required"/>
                </div>
				<a href="<?=SITE?>datos_recuperacion.php" id="forgot_pass" class="left">Olvidaste tu contraseña ?</a>
                <div class="submit">        	
                    <input class="boton" type="submit" value="Ingresar"/>
                </div>
            </form>
            
        </div>        
    </body>
</html>
<?php
	}
	else {
		Redireccionauto(USER);
	}
?>