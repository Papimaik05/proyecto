<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Inserción de producto</title>
    </head>

<body>
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <?php if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } ?>
	    <form action="validarInsercion.php" method="POST">
        <fieldset>
			<legend>Datos del producto </legend>
		    <label for="nombre">Nombre:</label>
		    <input type="text" name="nombre" id="nombre"><br><br>
		    <label for="descripcion">Descripción:</label>
		    <textarea name="descripcion" id="descripcion"></textarea><br><br>
		    <label for="unidades">Unidades:</label>
		    <input type="number" name="unidades" id="unidades"><br><br>
		    <label for="precio">Precio:</label>
		    <input type="number" name="precio" id="precio"><br><br>
		    <label for="imagen">URL de la imagen:</label>
		    <input type="text" name="imagen" id="imagen"><br><br>
		    <input type="submit" value="Insertar producto">
        </fieldset>
        <br><br><br>   
        </form>
	        </article>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
  
</body>
</html>