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
            <h2 style="color: white; text-indent:35px"><img src="../images/locked.png" alt="" />Panel de Administrador</h2>
            <form action="login.php" method="POST">
                <div class="input">
                    <input type="text" id="login" name='user' placeholder="Usuario"/>
                </div>
                
                <div class="input">
                    <input type="password" id="pass" name="password" placeholder="Contraseña"/>
                </div>

                <div class="submit">
                    <input type="submit" value="Ingresar"/>
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