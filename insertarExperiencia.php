<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Inserción de experiencia</title>
    </head>

<body>
            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
        <?php if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } ?>
	    <form action="validarInsercion.php?esExp=true" method="POST">
        <fieldset>
			<legend>Datos de la experiencia </legend>
		    <label for="nombre">Nombre:</label>
		    <input type="text" name="nombre" id="nombre"><br><br>
		    <label for="descripcion">Descripción:</label>
		    <textarea name="descripcion" id="descripcion"></textarea><br><br>		    
		    <label for="precio">Precio:</label>
		    <input type="number" name="precio" id="precio"><br><br>
            <label for="nivelminimo">Nivel mínimo:</label>
		    <input type="number" name="nivelminimo" id="nivelminimo"><br><br>
            <label for="puntos">Puntos:</label>
		    <input type="number" name="puntos" id="puntos"><br><br>
		    <label for="imagen">URL de la imagen:</label>
		    <input type="text" name="imagen" id="imagen"><br><br>
		    <input type="submit" value="Insertar experiencia">
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