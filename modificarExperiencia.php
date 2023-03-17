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
        require ('./includes/comun/cabecera.php');
    ?>
    <main>
    <?php
        $experiencias = Experiencia::cargarExperiencias();
         if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } 
        if(empty($experiencias)){
            echo '<h2>No hay experiencias en la tienda</h2>'; 
        }
        else{
            echo '<form action="validarEdicion.php?esExp=true" method="post">';
        
            echo '<label>Selecciona la experiencia que quieres modificar:</label>';
            echo '<ul>';
                foreach($experiencias as $e){
                    $id = $e->getId();
                    $nombre = $e->getNombre();
                    echo "<li><input type='radio' name='experiencia' value='". $id ."
                    '> ". $nombre ."</li>";
                }
                
                echo '</ul>';
                echo '<label>Ahora selecciona los valores a modificar</label>';
                echo '<fieldset>';
                echo '<label for="nombre">Nombre:</label>';
                echo '<input type="text" name="nombre" id="nombre"><br><br>';
                echo '<label for="descripcion">Descripción:</label>';
                echo '<textarea name="descripcion" id="descripcion"></textarea><br><br>';		
                echo '<label for="precio">Precio:</label>';
                echo '<input type="number" name="precio" id="precio"><br><br>';
                echo '<label for="nivelminimo">Nivel mínimo:</label>';
                echo '<input type="number" name="nivelminimo" id="nivelminimo"><br><br>';
                echo '<label for="puntos">Puntos:</label>';
                echo '<input type="number" name="puntos" id="puntos"><br><br>';
                echo '<label for="imagen">URL de la imagen:</label>';
                echo '<input type="text" name="imagen" id="imagen"><br><br>';
                echo ' </fieldset>';
                echo '<input type="submit" value="Enviar">';
                echo ' </form>';
        }
        $esExp=true;
    ?>  
    
    <br><br><br><br><br><br><br><br>
    </main>
<?php 
    require('./includes/comun/pie.php');
?>

</body>
</html>