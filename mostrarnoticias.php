<?php
require_once './includes/config.php';
require_once __DIR__.'/includes/noticia.php';
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
                    <div class="noticias">
            
            <section>
            <?php
            $noticias=Noticia::cargarNoticias();
            if($noticias==false){
                echo "No hay experiencias disponibles a la venta";
            }else{
            foreach($noticias as $noticia){
                echo"<h2>".$noticia->getTitulo()."<h2>";
                echo "<a href='vistaNoticia.php?id=" . urlencode($noticia->getId()) . "'><img src='". $noticia->getImagen() ."'></a>";
            }
            }
            ?>
        </section>
        </div>


                    
                </div>
            </main> 
            <?php
                require('./includes/comun/pie.php');
            ?>        
        
    </body>
</html>