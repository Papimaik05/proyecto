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
		<div class="container">
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
				echo "<div class='contcompra'>";
				echo "<h2>Compra realizada con éxito !!!</h2><img src='./img/compra.gif' id='imgFelicitaciones' alt='imgFelicitaciones'><br>";
				echo "</div>";
			}
			if(isset($_POST['borrar'])) {
				$_SESSION['carrito'] = array();
			}
			if ($_SESSION['carrito']) {
				$id = 0;
				foreach($_SESSION["carrito"] as $carrito){
					if(isset($_POST['borrar_'.$carrito['id'].''])){
						$id = $carrito['id'];
					}
				}
				if($id != 0){
					$i=0;
					$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
					foreach($carrito as $index => $producto){
						if($producto['id'] == $id){
							$i=$index;
						}
					}
					if (isset($carrito[$i])) {
						unset($carrito[$i]);
					}
					$_SESSION['carrito'] = $carrito;
					header("Location: vistaCarrito.php");
					exit();
				}	
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
			?>
			<div class="ticket">
			<img src="./img/cabeza_ticket.png" id="imgCarrito" alt="ticket">	
			<?php
				foreach($cantidades as $id => $unidades){
			?>
			<div class="productoCarrito">
			<?php
				$producto = Producto::buscaPorId($id);
				echo  "<h1>" . $producto->getNombre() . "</h1>";
				echo '<img src="' . $producto->getImagen() . '" id="imgVistaProducto" alt="producto">';
				echo  "<h2>" . $producto->getPrecio() . " € </h2>";
				echo  "<h2>" . $unidades . " Unidades </h2>";
				echo "<form method='post' action='vistaCarrito.php'>";
				echo "<input type='hidden' name='id' value='".$id."'>";
				echo "<input type='submit' name='borrar_".$id."' value='Eliminar'>";
				$total=$total+$producto->getPrecio()*$unidades;
			?>
			</div>
			<?php
				}
			?>
			<h2>El precio total del carrito es: </h2>
			<?php
				echo"<h2>$total € </h2>";
			?>
			</div>
			<form method="post">
			<input type="submit" name="submit" value="Comprar">
			<input type="submit" name="borrar" value="Vaciar">
			</form> 
			<?php
				} else {
				echo '<h2>El carrito está vacío</h2>';
				}


			?>
			</div>
			<?php 
				require("./includes/comun/pie.php");
			?>

	</body>
</html>