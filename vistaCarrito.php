<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Producto.php';
require_once __DIR__.'/includes/Experiencia.php';
require_once './includes/compraproducto.php';
require_once './includes/compraexperiencia.php';
require_once './includes/level.php';
?>
<?php
function eliminar($cantidades, $tipo){
	foreach($cantidades as $id => $unidades){

		if(isset($_POST['borrar_'.$id.'_'.$tipo])){
			$i=0;
			$units=0;
			$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
			foreach($carrito as $index => $producto){
				if($producto['id'] == $id && $producto['tipo'] == $tipo){
					$i=$index;
					if($_POST["unidades_a_borrar_".$id.""]>-1 || $tipo=='experiencia'){
						$units=$_POST["unidades_a_borrar_".$id.""];
					}else{
						header("Location: vistaCarrito.php");
						exit();
					}	
				}
			}
			if (isset($carrito[$i])) {
				if($units==0){
					unset($carrito[$i]);
				}
				else{
					$carrito[$i]['unidades']=$units;
				}

			}
			$_SESSION['carrito'] = $carrito;
			header("Location: vistaCarrito.php");
			exit();
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<link href= "./css/style.css" rel="stylesheet" type="text/css">
		<title>Carrito</title>
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

					if($carrito['tipo'] == 'producto'){
						$producto = Producto::buscaPorId($carrito['id']);
						$auxunidades=$producto->getUnidades();
						$auxunidades=$auxunidades-$carrito['unidades'];
						if($auxunidades >= 0){
							compraproducto::compraPro($username,$carrito['id'],$auxunidades,$carrito['unidades']);
						}
					}
					else if($carrito['tipo'] == 'experiencia'){
						$experiencia = Experiencia::buscaPorId($carrito['id']);
						$auxpuntos = $experiencia->getPuntos();
						compraexperiencia::compraExp($username,$carrito['id'],$auxpuntos);
						$_SESSION["puntos"]+=$auxpuntos;					
						$_SESSION["level"]=level::getLevel($_SESSION["puntos"])->getNombre();
					}
				
				}
				$_SESSION['carrito']=array();
				header("Location:felicitaciones.php");
			}
			
			if(isset($_POST['borrar'])) {
				$_SESSION['carrito'] = array();
			}
			if ($_SESSION['carrito']) {
				$cantidadesExp = array();
				$cantidadesProducto = array();
				foreach ($_SESSION['carrito'] as $carrito) {
					$id = $carrito['id'];
					$tipo = $carrito['tipo'];
					if($tipo == 'producto'){
						if(!isset($cantidadesProducto[$id])){
							$cantidadesProducto[$id] = $carrito['unidades'];
						}
						else{
							$cantidadesProducto[$id] = $cantidadesProducto[$id] + $carrito['unidades'];
						}
					}
					elseif($tipo == 'experiencia'){
						$cantidadesExp[$id] = 1;
					}
				}
				eliminar($cantidadesProducto, 'producto');
				eliminar($cantidadesExp, 'experiencia');
			
			
			?>
			<div class="ticket">
			<img src="./img/cabeza_ticket.png" id="imgCarrito" alt="ticket">	
			<?php
				$total = 0;
				foreach($cantidadesProducto as $id => $unidades){
			?>
			<div class="productoCarrito">
			<?php
			
				$producto = Producto::buscaPorId($id);
				echo  "<h1>" . $producto->getNombre() . "</h1>";
				echo '<img src="' . $producto->getImagen() . '" class="imgVistaProductoCarri" alt="producto">';
				echo  "<h2>" . $producto->getPrecio() . " € </h2>";
				echo  "<h2>" . $unidades . " Unidades </h2>";
				echo "<form method='post' action='vistaCarrito.php'>";
				echo "<input type='hidden' name='id' value='".$id."'>";
				echo '<h3>*Seleccione las unidades con las que se desea quedar, por ejemplo, con 0 unidades, se elimina el producto</h3>';
				echo '<label for="del_unidades_'.$id.'">Unidades:</label>';
                echo '<input type="number" name="unidades_a_borrar_'.$id.'" id="del_unidades_'.$id.'" min="0" max='.$unidades.' value="0"><br><br>';
				echo "<input type='submit' name='borrar_".$id."_producto' value='Actualizar'>";
				$total=$total+$producto->getPrecio()*$unidades;
				
			?>
			</div>
			<?php
				}
			?>
			<?php
				foreach($cantidadesExp as $id => $unidades){
			?>
			<div class="experienciaCarrito">
				<?php 
					$experiencia = Experiencia::buscaPorId($id);
					echo  "<h1>" . $experiencia->getNombre() . "</h1>";
					echo '<img src="' . $experiencia->getImagen() . '" class="exp_carrito" alt="producto">';
					echo  "<h2>" . $experiencia->getPrecio() . " € </h2>";
					echo  "<h2>Esta experiencia otorga : " . $experiencia->getPuntos() . " Puntos </h2>";
					echo "<form method='post' action='vistaCarrito.php'>";
					echo "<input type='hidden' name='id' value='".$id."'>";
					echo "<input type='submit' name='borrar_".$id."_experiencia' value='Eliminar'>";
					$total=$total+$experiencia->getPrecio();
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
				echo '<img src="./img/carrito_vacio.gif" alt="carrito vacio" id="imgFelicitaciones">';
				}


			?>
			</div>
			<?php 
				require("./includes/comun/pie.php");
			?>

	</body>
</html>