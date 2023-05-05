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
				<div class="insertarProductos">
					<article>
						<?php if (isset($_GET["mensaje"])) {
							echo "<p>" . $_GET["mensaje"] . "</p>";
						} ?>
						<form action="validarInsercion.php" method="POST" enctype="multipart/form-data">
							<fieldset>
								<legend>Datos del producto </legend>
								<label for="nombre">Nombre:</label>
								<input type="text" name="nombre" id="nombre"><br><br>
								<label for="descripcion">Descripción:</label>
								<textarea name="descripcion" id="descripcion"></textarea><br><br>
								<label for="unidades">Unidades:</label>
								<input type="number" name="unidades" id="unidades" min="0"><br><br>
								<label for="precio">Precio:</label>
								<input type="number"  inputmode="decimal" name="precio" id="precio" step="0.01" min="0"><br><br>
                                <label for="imagen">Selecciona una imagen:</label>
                                <input type="file" name="imagen" id="imagen"><br><br>
								<input type="submit" value="Insertar producto">
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