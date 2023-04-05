<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/producto.php';
require_once './includes/compraproducto.php';
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
	?>
	
	<?php
	$username=$_SESSION["nombre"];
	if(isset($_POST['submit'])) {

		foreach ($_SESSION['carrito'] as $carrito) {
			
			$producto = Producto::buscaPorId($carrito['id']);
			$auxunidades=$producto->getUnidades();
			$auxunidades=$auxunidades-$carrito['unidades'];
			if($auxunidades >= 0){
				compraproducto::compraPro($username,$carrito['id'],$auxunidades,$carrito['unidades']);
			}
			
		}
		$_SESSION['carrito']=array();
		echo "<h2>Compra realizada con éxito !!!</h2>";
    }
	if ($_SESSION['carrito']) {
		$total=0;
		$cantidades = array();
		foreach ($_SESSION['carrito'] as $carrito) {
			$id = $carrito['id'];
			if(!isset($cantidades[$id])){
				$cantidades[$id] = $carrito['unidades'];
			}
			else{
				$cantidades[$id] = $cantidades[$id] + $carrito['unidades'];
			}
		}
		foreach($cantidades as $id => $unidades){
			$producto = Producto::buscaPorId($id);
			echo  "<h1>" . $producto->getNombre() . "</h1>";
			echo '<img src="' . $producto->getImagen() . '" width="400" height="400">';
			echo  "<h2>" . $producto->getPrecio() . " € </h2>";
			echo  "<h2>" . $unidades . " Unidades </h2>";
			$total=$total+$producto->getPrecio()*$unidades;
		}
		?>
		<h2>El precio total del carrito es: </h2>
		<?php
		echo"<h2>$total € </h2>";
		?>
		<form method="post">
		<input type="submit" name="submit" value="Comprar">
		</form> 
		<?php
	} else {
	echo '<h2>El carrito está vacío</h2>';
	}


	?>
    <?php 
	require("./includes/comun/pie.php");
	?>

</body>
</html>