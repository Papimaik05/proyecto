<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/pedido.php';
require_once './includes/producto.php';
require_once './includes/experiencias.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Index</title>
    </head>

<body>
    
            <?php
            require ('./includes/comun/cabecera.php');
            
            ?>
	    <main>
            <h1>Historial de pedidos</h1>
<?php
  $pedidos=Pedido::cargaPedidos($_SESSION['nombre']);

  if($pedidos == false){
    echo "No hay pedidos realizados";
}
else{    
    foreach($pedidos as $pedido){
if($pedido->getUnidades()){
$producto=Producto::buscaPorId($pedido->getIdProducto());
echo "<img src='". $producto->getImagen() ."'width='100' alt = 'imgProducto' height='100'>";
echo "<h3>" . $producto->getNombre() ."</h3>";
echo "<h3>Unidades:" . $pedido->getUnidades() ."</h3>";
echo "<h3>Total: " . $pedido->getUnidades()*$producto->getPrecio() ." euros</h3>";
echo "<br>";
}else{
    $experiencia=Experiencia::buscaPorId($pedido->getIdProducto());
    echo "<img src='". $experiencia->getImagen() ."'width='100' alt = 'imgExperiencia' height='100'>";
    echo "<h3>" . $experiencia->getNombre() ."</h3>";
    echo "<h3>Total: " . $experiencia->getPrecio() ." euros</h3>";
    echo "<br>";

}

    }
}
?>

	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
        
        
        
</body>
</html>