<?php
	include ('../load/functions.php');
	if(!sesion_root()){
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
            
            <form action="login.php" method="POST" id='form_login_admin'>
                <div class="input">
                    <input type="text" id="login" name='user' placeholder="Usuario" required="required"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass" name="password" placeholder="Contraseña" required="required"/>
                </div>
				<center><div id="ajax_loader"><img id="loader_gif" src="<?=IMAGES?>ajax-loader.gif" style='display: none;'/></div></center>
                <div class="submit">
                    <input id='btn_login_admin' class="boton" type="submit" value="Ingresar"/>
                </div>
            </form>     
        </div>   
    </body>
</html>
<?php
	}
	else {
		Redirecciona(ADMINISTRADOR.'dentro.php');
	}
?>