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
    require_once __DIR__.'/includes/producto.php';
    require_once __DIR__.'/includes/experiencias.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "http://localhost/proyecto/assets/style.css" rel="stylesheet" type="text/css">
    <title>Tienda</title>
</head>

<body>

    <?php
        require ('./includes/comun/cabecera.php');
    ?>
    <div class="container">
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

<div class="productos">
<h2>Equipamiento</h2>
<?php
$productos = Producto::cargarProductos();

if($productos == false){
    echo "No hay productos disponibles a la venta";
}
else{ 
    foreach($productos as $producto){
        ?>
        <div class="item">
            <?php  
            echo "<img src='". $producto->getImagen() ."'id='imagen_producto'>";
            ?>
            <div class="texto">
                <?php  
                echo "<h3><a id='link' href='vistaProducto.php?id=" . $producto->getId() . "'> ".$producto->getNombre()."</a></h3>";
                ?>
            </div>
        </div>    
        <?php
        echo "<br><br><br><br>";
    }
}

if(isset($_REQUEST["botonComprar"])){
	producto();
	header("Location: producto.php ");
}
?>
</div>
</div>
<?php
require('./includes/comun/pie.php');
?>

</body>
</html>