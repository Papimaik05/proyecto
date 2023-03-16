<?php
    require_once __DIR__.'/includes/Experiencias.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Modificar experiencia</title>
</head>

<body>
    <?php
        require ('cabecera.php');
    ?>
    <main>
    <?php
        $experiencias = Experiencia::cargarExperiencias();
         if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } 
        $esExp=true;
    ?>  
    <form action="validarEdicion.php?esExp=true" method="post">
        
        <label>Selecciona la experiencia que quieres modificar:</label>
        <ul>
            <?php foreach($experiencias as $e){
                $id = $e->getId();
                $nombre = $e->getNombre();
                echo "<li><input type='radio' name='experiencia' value='". $id ."
                '> ". $nombre ."</li>";
            }
            ?>
        </ul>
        <label>Ahora selecciona los valores a modificar</label>
        <fieldset>
        <label for="nombre">Nombre:</label>
		<input type="text" name="nombre" id="nombre"><br><br>
		<label for="descripcion">Descripción:</label>
		<textarea name="descripcion" id="descripcion"></textarea><br><br>		
		<label for="precio">Precio:</label>
		<input type="number" name="precio" id="precio"><br><br>
		<label for="nivelminimo">Nivel mínimo:</label>
        <input type="number" name="nivelminimo" id="nivelminimo"><br><br>
		<label for="imagen">URL de la imagen:</label>
		<input type="text" name="imagen" id="imagen"><br><br>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>
    <br><br><br><br><br><br><br><br>
    </main>
<?php 
    require('pie.php');
?>

</body>
</html>