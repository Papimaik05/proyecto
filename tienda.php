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
    require_once __DIR__.'/includes/Experiencia.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Tienda</title>
</head>
<body>
    <?php
        require ('./includes/comun/cabecera.php');
    ?>
    <div class="container">
        <h1>Tienda</h1>
        <br>
        <div class="productos">
            <h2>Experiencias</h2>
            <?php
            $experiencias=Experiencia::cargarExperiencias();
            if($experiencias==false){
                echo "No hay experiencias disponibles a la venta";
            }else{
                ?>
                <div class="catalogo">
                <?php
                foreach($experiencias as $experiencia){
                ?>
                    <a class="item" <?php echo "href='vistaExperiencia.php?id=" . $experiencia->getId() . "'"; ?>>
                        <?php  
                        echo "<img src='". $experiencia->getImagen() ."' alt='imgProducto' class='img_exp'>";
                        ?>
                        <div class="texto">
                            <?php  
                            echo "<h3>".$experiencia->getNombre()."</h3>";
                            ?>
                        </div>
                    </a>    
                <?php
                }
            }
            ?>
        </div>
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
                ?>
                <div class="catalogo">
                    <?php  
                        foreach($productos as $producto){
                        ?>
                            <a class="item" <?php echo "href='vistaProducto.php?id=" . $producto->getId() . "'"; ?>>
                                <?php  
                                echo "<img src='". $producto->getImagen() ."' alt='imgProducto'>";
                                ?>
                                <div class="texto">
                                    <?php  
                                    echo "<h3>".$producto->getNombre()."</h3>";
                                    ?>
                                </div>
                            </a>    
                        <?php
                        }
                    ?>
                </div>    
            <?php
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