<?php
require_once './includes/config.php';
require_once __DIR__.'/includes/Noticia.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Noticias</title>
    </head>

    <body>
            <?php
                require ('./includes/comun/cabecera.php');
            ?>
            <main>
                <div class="container">
                    <h1>Ultimas Noticias</h1>
                    <br><br>
                    <div class="noticias">                                
                        <?php
                        $noticias=Noticia::cargarNoticias();
                        if($noticias==false){
                            echo "No hay experiencias disponibles a la venta";
                        }else{
                            foreach($noticias as $noticia){
                                ?>
                                <div class='noticiaBox'>
                                <?php
                                echo "<h2>".$noticia->getTitulo()."<h2>";
                                echo "<h2>".$noticia->getFecha()."<h2>";
                                echo "<a href='vistaNoticia.php?id=" . urlencode($noticia->getId()) . "'><img src='". $noticia->getImagen() ."'id='icono_noticia'></a>";
                                echo "<h3>Clickea en la imagen para ver la noticia</h3>";
                                echo "<br><br>";
                                ?>
                                </div>
                                <?php
                            }
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