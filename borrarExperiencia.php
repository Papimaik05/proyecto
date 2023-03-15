<?php
    require_once __DIR__.'/includes/Experiencias.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Borrar experiencia</title>
</head>

<body>
    <?php
        require ('cabecera.php');
    ?>
    <main>
    <?php
        $experiencias = Experiencia::cargarExperiencias();?>
        <?php if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } ?>
    <form action="validarBorrado.php" method="post">
        
        <label>Lista de Experiencias:</label>
        <ul>
            <?php foreach($experiencias as $p){
                $id = $p->getId();
                $nombre = $p->getNombre();
                echo "<li><input type='checkbox' name='experiencias[]' value='". $id ."'> ". $nombre ."</li>";
            }
            ?>
        </ul>
        <input type="submit" value="Enviar">
    </form>
    <br><br><br><br><br><br><br><br>
    </main>
<?php 
    require('pie.php');
?>

</body>
</html>