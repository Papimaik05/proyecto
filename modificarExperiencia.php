<?php
    require_once __DIR__.'/includes/experiencias.php';
    require_once './includes/config.php';
    require_once './includes/level.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <link href= "./css/style.css" rel="stylesheet" type="text/css">
        <title>Modificar experiencia</title>
    </head>

    <body>

        <?php
            require ('./includes/comun/cabecera.php');
        ?>
        <main>
                <div class="container">
                    <div class="exp">
                        <ul class="modificarExp">
                        
                            <?php
                                $experiencias = Experiencia::cargarExperiencias();
                                if (isset($_GET["mensaje"])) {
                                echo "<p>" . $_GET["mensaje"] . "</p>";
                                } 
                                if(empty($experiencias)){
                                    echo '<h2>No hay experiencias en la tienda</h2>'; 
                                }
                                else{
                                    echo '<form action="validarEdicion.php?es=experiencia" method="post"  enctype="multipart/form-data">';
                                
                                    echo '<label>Selecciona la experiencia que quieres modificar:</label>';
                                    
                                        foreach($experiencias as $e){
                                            $id = $e->getId();
                                    $nombre = $e->getNombre();
                                    $descripcion = $e->getDescripcion();
                                    $precio = $e->getPrecio();
                                    $puntos=$e->getPuntos();
                                    $imagen = $e->getImagen();
                                    echo "<li><input type='radio' name='experiencia' value='". $id ."' data-nombre='". $nombre ."' data-descripcion='". $descripcion ."' data-precio='". $precio ."' data-imagen='". $imagen ."'data-puntos='". $puntos ."'> ". $nombre ."</li>";

                                        }
                                        
                        echo '</ul>';
                                    echo '<label>Ahora selecciona los valores a modificar</label>';
                                    echo '<fieldset>';
                                    echo '<label for="nombre">Nombre:</label>';
                                    echo '<input type="text" name="nombre" id="nombre"><br><br>';
                                    echo '<label for="descripcion">Descripción:</label>';
                                    echo '<textarea name="descripcion" id="descripcion"></textarea><br><br>';		
                                    echo '<label for="precio">Precio:</label>';
                                    echo '<input type="number" name="precio" id="precio"><br><br>';
                                    echo '<label for="nivelminimo">Nivel mínimo:</label>';
                                    echo '<select name ="nivelminimo" id="nivelminimo">';
                                    
                                    $result=level::getAllLevels();
                                    while($row=mysqli_fetch_object($result)){
                                        echo "<option value=$nivelminimo>$row->nombre</option>";
                                    }
                                    echo'</select> <br><br>';
                                    echo '<label for="puntos">Puntos:</label>';
                                    echo '<input type="number" name="puntos" id="puntos"><br><br>';
                                    echo '<label for="imagen">Selecciona una imagen:</label>';
                                    echo '<input type="file" name="imagen" id="imagen"><br><br>';
                                    echo '</fieldset>';
                                    echo '<input type="submit" value="Enviar">';
                                    echo '</form>';
                                }
                        ?> 
                        <script>
                            
    var radios = document.querySelectorAll('input[type="radio"][name="experiencia"]');
    radios.forEach(function(radio){
        radio.addEventListener('click', function(){
            document.getElementById("nombre").value = this.getAttribute("data-nombre");
            document.getElementById("descripcion").value = this.getAttribute("data-descripcion");
            document.getElementById("puntos").value = this.getAttribute("data-puntos");
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