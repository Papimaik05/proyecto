<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Producto.php';
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
	<div class="container" id="cont_prod">
		<?php
			$id = $_GET["id"];
			$producto = Producto::buscaPorId($id);
			if(isset($_POST['submit'])) {
				$unidades=$_POST['Unidades'];
				$_SESSION['carrito'][] = array(
					'id'=>$id,
					'unidades'=> $unidades,
					'precio'=> $producto->getPrecio()*$unidades,
					'tipo'=> 'producto'
				);
				header("Location:vistaCarrito.php");

			}
		?>
		<div class="big_caja">
		<div class="cajafoto">
		<?php
			echo  "<h1>" . $producto->getNombre() . "</h1>";
			echo '<img src="' . $producto->getImagen() . '" onmouseover="mostrarZoom(event, this.src)" class="imgVistaProducto" alt="imagen">';
		?>
		</div>
		<div class="cajatexto">
		<?php
			echo "<p>" . $producto->getDescripcion() ."</p>";
			echo  "<h2>" . $producto->getPrecio() . " € </h2>"; 
			echo "<p> Quedan " . $producto->getUnidades() ." unidades</p>";
			echo "<form  method='POST'>";
			$aux=$producto->getUnidades();
			if($aux>0){
				echo "<p>Cantidad: <input type=number value=1 name=Unidades id=Unidades min=1 max=$aux></p>";
				if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) ){ 
					?>
					<input type="submit" name="submit" value="Añadir" id="botoncompra"> 
					<?php
				}
			}
		?>
	</form>
	<br>
		</div>
		</div>
		<script src="./js/zoom.js"></script>
		</div>
		<?php 
		require("./includes/comun/pie.php");
		?>

	</body>
</html>