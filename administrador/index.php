<?php
	include ('../load/functions.php');
	if(!sesion()){
?>
<html>
    <?
    include ('../load/head.php');
    ?>
    </head>
    <body>
        <div id="content" class="login">
        	<center><a title="Inicio" href="<?=SITE?>"><div id="banner"></div></a></center>	
        	<h2 style="color: white"><img src="../images/locked.png" alt="" />Panel de Administrador</h2>
            <?php if (isset ($_GET['e'])){ ?>
					<div class="notif error bloc">
						<strong>Error :</strong> Usuario y/o Contraseña invalida
						<a href="#" class="close"></a>
					</div>
			<?php } ?>
            
            <form action="login.php" method="POST">
                <div class="input">
                    <input type="text" id="login" name='user' placeholder="Usuario"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass" name="password" placeholder="Contraseña"/>
                </div>

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
		header("Location: dentro.php");
	}
?>