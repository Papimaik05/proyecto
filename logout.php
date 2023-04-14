<?php

require_once './includes/config.php';

unset($_SESSION["login"]);
unset($_SESSION["nombre"]);
if (isset($_SESSION["esadmin"])) { 
    unset($_SESSION["esadmin"]);
}
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Logout</title>
    </head>

    <body>
        <?php
            require ('./includes/comun/cabecera.php');
        ?>
	    <main>
            <div class="container">
	            <article>  
                    <h2>Has cerrado la sesión </h2>
                    <br>
                    <h2>Hasta Pronto!</h2>
	            </article>
            </div>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
    </body>
</html>
