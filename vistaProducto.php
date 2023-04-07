<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/producto.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href= "http://localhost/proyecto/assets/style.css" rel="stylesheet" type="text/css">
    <title>Producto</title>
</head>

<body>
	<?php  
	require ('./includes/comun/cabecera.php');
	$id = $_GET["id"];
	$producto = Producto::buscaPorId($id);
	if(isset($_POST['submit'])) {
		$unidades=$_POST['Unidades'];
		$_SESSION['carrito'][] = array(
			'id'=>$id,
			'unidades'=> $unidades,
			'precio'=> $producto->getPrecio()*$unidades

		);
	}
	echo  "<h1>" . $producto->getNombre() . "</h1>";
	echo '<img src="' . $producto->getImagen() . '" width="400" height="400">';
	echo "<p>" . $producto->getDescripcion() ."</p>";
	echo  "<h2>" . $producto->getPrecio() . " € </h2>"; 
	echo "<p> Quedan " . $producto->getUnidades() ." unidades</p>";
	
	?>
	<form  method="POST">
		<?php
		$aux=$producto->getUnidades();
		if($aux>0){
			echo "<p>Cantidad: <input type=number value=1 name=Unidades id=Unidades min=1 max=$aux></p>";
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) ){ 
				?>
				<input type="submit" name="submit" value="Añadir">
				<?php
			}
		}
		?>
	</form>
	<br>
    <?php 
	require("./includes/comun/pie.php");
	?>

</body>
</html>