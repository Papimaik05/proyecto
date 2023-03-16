<?php
    require_once __DIR__.'/includes/Producto.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Borrar producto</title>
</head>

<body>
    <?php
        require ('cabecera.php');
    ?>
    <main>
    <?php
        $productos = Producto::cargarProductos();?>
        <?php if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    } ?>
    <form action="validarBorrado.php" method="post">
        
        <label>Lista de Productos:</label>
        <ul>
            <?php foreach($productos as $p){
                $id = $p->getId();
                $nombre = $p->getNombre();
                echo "<li><input type='checkbox' name='productos[]' value='". $id ."
                '> ". $nombre ."</li>";
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