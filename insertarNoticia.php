<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        
        <title>Inserción de producto</title>
    </head>

<body>

            <?php
            require ('./includes/comun/cabecera.php');
            ?>
	    <main>
			<div class="container">
				<div class="insertarNoticia">
					<article>
						<?php if (isset($_GET["mensaje"])) {
							echo "<p>" . $_GET["mensaje"] . "</p>";
						} ?>
						<form action="validarInsercion.php?esNoticia=true" method="POST">
							<fieldset>
								<legend>Datos de la noticia </legend>
								<label for="titulo">Titulo:</label>
								<input type="text" name="titulo" id="titulo"><br><br>
								<label for="descripcion">Descripción:</label>
								<textarea name="descripcion" id="descripcion"></textarea><br><br>							
								<label for="imagen">URL de la imagen:</label>
								<input type="text" name="imagen" id="imagen"><br><br>
                                <label for="imagen">Fecha:</label>
								<input type="date" name="fecha" id="fecha"><br><br>
								<input type="submit" value="Insertar noticia">
							</fieldset>
							<br><br><br>   
						</form>
	        		</article>
				</div>
			</div>
	    </main> 
        <?php
            require('./includes/comun/pie.php');
        ?>        
</body>
</html>