<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>GestorContenido</title>
    </head>

<body>
    
            <?php
            require ('cabecera.php');
            ?>
	    <main>
        <button onclick="window.location.href='insertarProducto.php'" type="button" > Insertar Producto</button>
		<button onclick="window.location.href='borrarProducto.php'" type="button" > Borrar producto</button>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </form>
	    </main> 
        <?php
            require('pie.php');
        ?>        
        
</body>
</html>