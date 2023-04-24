<?php
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css"/>
        <title>Blog</title>
    </head>

    <body>
        <?php
        require ('./includes/comun/cabecera.php');
        ?>
	    <main>
            <div class="container">
	            <h1>Esta página se encuentra en mantenimiento</h1>
                <img src="./img/mantenimiento.png"  id="imgMantenimiento" alt="mantenimiento">
                <h2>Dentro de poco podrás consultar nuestro blog</h2>
            </div>
	    </main> 

        <?php
            require('./includes/comun/pie.php');
        ?>        
    
    </body>
</html>