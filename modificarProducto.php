<?php
    require_once __DIR__.'/includes/producto.php';
    require_once './includes/config.php';
?>

<!DOCTYPE html>
<html>
    <head>
    
        <link href= "./css/style.css" rel="stylesheet" type="text/css">
        <title>Modificar producto</title>
    </head>

    <body>

            <?php
                require ('./includes/comun/cabecera.php');
            ?>
            <main>
            <div class="container">
                <div class="productos">
                    <ul class="modificarProductos">

                        <?php
                            $productos = Producto::cargarProductos();
                            if (isset($_GET["mensaje"])) {
                            echo "<p>" . $_GET["mensaje"] . "</p>";
                            } 
                        
                            if(empty($productos)){
                                echo '<h2>No hay productos en la tienda</h2>'; 
                            }
                            else{
                                echo '<form action="validarEdicion.php?es=producto" method="post" enctype="multipart/form-data">';
                                echo '<label>Selecciona el producto que quieres modificar:</label>';
                            
                                foreach($productos as $p){
                                    $id = $p->getId();
                                    $nombre = $p->getNombre();
                                    $descripcion = $p->getDescripcion();
                                    $unidades = $p->getUnidades();
                                    $precio = $p->getPrecio();
                                    $imagen = $p->getImagen();
                                    echo "<li><input type='radio' name='producto' value='". $id ."' data-nombre='". $nombre ."' data-descripcion='". $descripcion ."' data-unidades='". $unidades ."' data-precio='". $precio ."' data-imagen='". $imagen ."'> ". $nombre ."</li>";
                                }
                                echo '</ul>';
                                echo '<label>Ahora selecciona los valores a modificar: </label>';
                                echo '<fieldset>';
                                echo '<label for="nombre">Nombre:</label>';
                                echo '<input type="text" name="nombre" id="nombre"><br><br>';
                                echo '<label for="descripcion">Descripción:</label>';
                                echo '<textarea name="descripcion" id="descripcion"></textarea><br><br>';
                                echo '<label for="unidades">Unidades:</label>';
                                echo '<input type="number" name="unidades" id="unidades" min="0"><br><br>';
                                echo '<label for="precio">Precio:</label>';
                                echo '<input type="number" name="precio" id="precio" min="0"><br><br>';
                                echo '<label for="imagen">Selecciona una imagen:</label>';
                                echo '<input type="file" name="imagen" id="imagen"><br><br>';
                                echo '</fieldset>';
                                echo '<input type="submit" value="Enviar">';
                                echo '</form>';
                            }
                        
                        ?>
                        <script>
                            var radios = document.querySelectorAll('input[type="radio"][name="producto"]');
                            radios.forEach(function(radio){
                                radio.addEventListener('click', function(){
                                    document.getElementById("nombre").value = this.getAttribute("data-nombre");
                                    document.getElementById("descripcion").value = this.getAttribute("data-descripcion");
                                    document.getElementById("unidades").value = this.getAttribute("data-unidades");
                                    document.getElementById("precio").value = this.getAttribute("data-precio");
                                    document.getElementById("imagen").value = this.getAttribute("data-imagen");
                                });
                            });
                        </script>
                </div>
            </div>
                   
            
        <?php 
            require('./includes/comun/pie.php');
        ?>
        </main>
    </body>
</html>