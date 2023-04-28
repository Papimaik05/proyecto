<?php
    require_once './includes/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>GestorContenido</title>
    </head>

    <body>

        <?php
            require ('./includes/comun/cabecera.php');
        ?>
	    <main>
            <div class="container">
                <h1>Noticias</h1>

                <div class="auxgestor">
                    <div class="card">
                        <figure>
                            <img src="./img/Tick.png"  alt="icono_gestor">
                        </figure>

                        <div class="contenido">
                            <h3>Insertar Noticia</h3>
                            <p>Haz click aquí para insertar una nueva noticia</p>
                            <a href="insertarNoticia.php">Insertar</a>
                        </div>
                    </div>

                   

                    <div class="card">
                        <figure>
                            <img src="./img/cruzroja.jpg"  alt="icono_gestor3">
                        </figure>
                        <div class="contenido">
                            <h3>Borrar Noticia</h3>
                            <p>Haz click aquí para borrar una noticia existente</p>
                            <a href="borrarNoticia.php">Borrar</a>
                        </div>
                    </div>
                </div>
                <br><br>                

                
            </div>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
       
</body>
</html>