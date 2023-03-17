<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/producto.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Producto</title>
</head>

<body>
	<?php  
	require ('./includes/comun/cabecera.php');
	$id = $_GET["id"];
	$producto = Producto::buscaPorId($id);

	echo  "<h1>" . $producto->getNombre() . "</h1>";
	echo '<img src="' . $producto->getImagen() . '" width="400" height="400">';
	echo "<p>" . $producto->getDescripcion() ."</p>";
	echo  "<h2>" . $producto->getPrecio() . " € </h2>"; 
	echo "<p> Quedan " . $producto->getUnidades() ." unidades</p>";
	
	?>
	<form action="producto.php" method="POST">
		<?php
		$aux=$producto->getUnidades();
		echo "<p>Cantidad: <input type=number value=1 name=Unidades min=1 max=$aux></p>"
		?>
	</form>
	<br>

    <?php 
	require("./includes/comun/pie.php");
	?>

</body>
</html>