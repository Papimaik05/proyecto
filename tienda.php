<?php
require_once './includes/config.php';
?>
<?php
	function producto(){
	$producto = htmlspecialchars(trim(strip_tags($_REQUEST["producto"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$img = htmlspecialchars(trim(strip_tags($_REQUEST["img"])));
    $id = htmlspecialchars(trim(strip_tags($_REQUEST["id"])));
	$_SESSION["producto"] = $producto;
	$_SESSION["precio"] = $precio;
	$_SESSION["img"] = $imagen;
    $_SESSION["id"] = $id;
	}
    require_once __DIR__.'/includes/Producto.php';
    require_once __DIR__.'/includes/experiencias.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "css/style.css" rel="stylesheet" type="text/css">
    <title>Tienda</title>
</head>

<body>
    <?php
        require ('./includes/comun/cabecera.php');
    ?>
    
    <h1>Tienda</h1>
    <br>
<div class="experiencias">
    <h2>Experiencias</h2>
    <section>
    <?php
    $experiencias=Experiencia::cargarExperiencias();
    if($experiencias==false){
        echo "No hay experiencias disponibles a la venta";
    }else{
    foreach($experiencias as $experiencia){
        echo "<a href='vistaExperiencia.php?id=" . $experiencia->getId() . "'><img src='". $experiencia->getImagen() ."'> </a> ";
    }
    }
    ?>
        
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
        echo "<h3>" . $producto->getNombre() ." &nbsp; <a href='vistaProducto.php?id=" . $producto->getId() . "'>Comprar</a></h3>";
        echo "<br><br><br><br>";
    }
}
?>

<?php 
	if(isset($_REQUEST["botonComprar"])){
		producto();
		header("Location: producto.php ");
	}
    require('./includes/comun/pie.php');
?>

</body>
</html>