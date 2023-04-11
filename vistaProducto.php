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
<div class="container">
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
		header("Location:vistaCarrito.php");

	}
	echo  "<h1>" . $producto->getNombre() . "</h1>";
	echo '<img src="' . $producto->getImagen() . '"onmouseover="mostrarZoom(event, this.src)" id="imgVistaProducto">';
	echo "<p>" . $producto->getDescripcion() ."</p>";
	echo  "<h2>" . $producto->getPrecio() . " € </h2>"; 
	echo "<p> Quedan " . $producto->getUnidades() ." unidades</p>";
	
	?>
	<script>
function mostrarZoom(event, src) {
  var zoom = document.createElement("img");
  zoom.setAttribute("src", src);
  zoom.setAttribute("style", "position: absolute; top: " + event.clientY + "px; left: " + event.clientX + "px; width: 500px; height: 500px;");
  document.body.appendChild(zoom);
  zoom.style.visibility = "visible";
}

document.addEventListener("mousemove", function(event) {
  var zoom = document.querySelector("img[src='" + event.target.src + "']");
  if (zoom) {
    zoom.style.top = (event.clientY + 50) + "px";
    zoom.style.left = (event.clientX + 50) + "px";
  }
});

document.addEventListener("mouseout", function(event) {
  var zoom = document.querySelector("img[src='" + event.target.src + "']");
  if (zoom) {
    zoom.parentNode.removeChild(zoom);
  }
});
</script>
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
</div>
</body>
</html>