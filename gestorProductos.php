<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="http://localhost/proyecto/assets/style.css" />
        <title>GestorContenido</title>
    </head>

<body>
    
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <button onclick="window.location.href='insertarProducto.php'" type="button" > Insertar Producto</button>
		<button onclick="window.location.href='borrarProducto.php'" type="button" > Borrar Producto</button>
        <button onclick="window.location.href='modificarProducto.php'" type="button" > Modificar Producto</button>
        <br>     
        <br><br>
        <br><br>        
        <button onclick="window.location.href='insertarExperiencia.php'" type="button" > Insertar Experiencia</button>
		<button onclick="window.location.href='borrarExperiencia.php'" type="button" > Borrar Experiencia</button>
        <button onclick="window.location.href='modificarExperiencia.php'" type="button" > Modificar Experiencia</button>
        
    </form>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
</body>
</html>