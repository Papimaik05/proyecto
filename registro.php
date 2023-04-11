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
        <div class="container">
        <div class="iniciosesion">
	        <article>  
                <br><br><br>
            <form action="procesarRegistro.php" method="post">
            <fieldset>
                <legend>DATOS REGISTRO</legend>
               <br><input type="text" name="nombre" placeholder="Usuario" > 
                <br>
                <br><input type="text" name="email" placeholder="Email" > 
                <br>
                <br><input type="password" name="contr" placeholder="Contraseña" > 
                <br>
                <br><input type="password" name="contr2"placeholder="Repita Contraseña" > 
        
            </fieldset>
            <br>
            <button type="submit" name="registro">Registrar</button>
            <br><br><br><br><br>
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