<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/producto.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Producto</title>
</head>

<body>
	<?php  
	require ('cabecera.php');
	$id = $_GET['id'];
	$idproducto = Producto::buscaPorId($id);

	echo  "<h1>" . $_SESSION["producto"] . "</h1>";
	echo '<img src="' . $_SESSION["img"] . '" width="400" height="400">';
	echo  "<h2>" . $_SESSION["precio"] . " € </h2>"; 
	
	?>

	<form action="producto.php" method="POST">
	<p>Cantidad: <input type="number" value="1" name="Unidades" width="5" min="1"></p> 
	</form>
	<br>

    <?php 
	require("pie.php");
	?>

</body>
</html>