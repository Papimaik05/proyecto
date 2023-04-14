<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Login</title>
    </head>

<body>

            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>  
        <div class="container" id="login">
            <div class="formulario">
                <h1>Inicio de sesión</h1>
                <form action="validarLogin.php" method="post">
                    <div class="username">
                        <input type="text" name="nombre">
                        <label>Nombre de Usuario</label>
                    </div>
                    <div class="username">
                        <input type="password" name="contr" >
                        <label>Contraseña</label>
                    </div>  
                    <?php
                        if(isset($_GET["error"])){
                            echo'<h3>'.$_GET["error"].'</h3>';
                        }
                    ?>       
                    <br>
                    <input type="submit"   name="aceptar" value="Iniciar">
                    <br>
                    <div class="registrarse">
                        Regístrese <a href="registro.php">aqui</a>
                    </div>
                </form>
            </div>
        </div>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        

</body>
</html>