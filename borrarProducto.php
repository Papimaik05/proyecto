<?php
    require_once __DIR__.'/includes/producto.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Borrar producto</title>
</head>

<body>
    <?php
        require ('./includes/comun/cabecera.php');
    ?>
    <main>
    <div class="container">
    <div class="borrar">
    
    <?php
        $_SESSION["diferenciar"]=true;
        $productos = Producto::cargarProductos();?>
        <?php if (isset($_GET["mensaje"])) {
		 echo "<p>" . $_GET["mensaje"] . "</p>";
	    }

        if(empty($productos)){
            echo '<h2>No hay productos en la tienda</h2>'; 
        }
        else{
            echo '<form action="validarBorrado.php" method="post">';
            echo '<label>Lista de Productos:</label>';
            echo '<ul>';
            foreach($productos as $p){
                $id = $p->getId();
                $nombre = $p->getNombre();
                echo "<li><input type='checkbox' name='productos[]' value='". $id ."
                '> ". $nombre ."</li>";
            }     
            echo '</ul>';
            echo '<br>';
            echo '<input type="submit" value="Enviar">';
            echo '</form>';
        }        
        ?>
    </div>
    </div>
    </main>
<?php 
    require('./includes/comun/pie.php');
?>
</body>
</html>