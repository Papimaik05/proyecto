<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>Registro</title>
    </head>

<body>
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <div class="container" id="login">
        <div class="formulario">
            <h1>Registro</h1>
	        <article>  
            <form action="procesarRegistro.php" method="post">
                <div class="username">
                    <input type="text" name="nombre" required>
                    <label>Nombre de Usuario</label>
                </div>
                <div class="username">
                    <input type="text" name="email" required>
                    <label>Email</label>
                </div>
                <div class="username">
                    <input type="password" name="contr" required>
                    <label>Contraseña</label>
                </div>
                <div class="username">
                    <input type="password" name="contr" required>
                    <label>Repetir contraseña</label>
                </div> 
                <?php
                if(isset($_GET["error"])){
                    echo'<h3>'.$_GET["error"].'</h3>';
                }
                ?>    
            </fieldset>
            <br>
                <button type="submit" name="registro">Registrar</button>
                <br>
        </form>
	        </article>
            </div>
            </div> 
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>            
</body>
</html>