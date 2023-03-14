<?php
require_once './includes/config.php';
?>
<?php
	function producto(){
	$producto = htmlspecialchars(trim(strip_tags($_REQUEST["producto"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$img = htmlspecialchars(trim(strip_tags($_REQUEST["img"])));
	$_SESSION["producto"] = $producto;
	$_SESSION["precio"] = $precio;
	$_SESSION["img"] = $imagen;
	}
    require_once __DIR__.'/includes/Producto.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Tienda</title>
</head>

<body>
    <?php
        require ('cabecera.php');
    ?>

    <h1>Tienda</h1>
    <br>
<div class="experiencias">
    <h2>Experiencias</h2>
    <section>
        <img src="./img/pesca_inaki.jpg">
        <img src="./img/pinguinos_madagascar.jpg">
        <img src="./img/nemo.jpg">
        <img src="./img/jaula_tiburones.jpg">
    </section>
</div>
<br><br><br><br>


<div class="equipamiento">
<h2>Equipamiento</h2>
<?php
$productos = Producto::cargarProductos();
if($productos == false){
    echo "No hay productos disponibles a la venta";
}
else{
    foreach($productos as $producto){
        echo "<img src='". $producto->getImagen() ."'width='200' alt = 'imgProducto' height='200'>";
        echo "<h3>" . $producto->getNombre() ." &nbsp; <a href='index.php'>Comprar</a></h3>";
        echo "<p>" . $producto->getDescripcion() ."</p>";
        echo "<br><br><br><br>";
    }
}
?>

<?php 
	if(isset($_REQUEST["botonComprar"])){
		producto();
		header("Location: producto.php ");
	}
    require('pie.php');
?>

</body>
</html>