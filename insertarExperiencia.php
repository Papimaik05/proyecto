<?php
require_once './includes/config.php';
require_once './includes/level.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Inserción de experiencia</title>
    </head>

	<body>
		<?php
			require ('./includes/comun/cabecera.php');
		?>
		<main>
			<div class="container">
				<div class="insertarExp">
					<article>
						<?php if (isset($_GET["mensaje"])) {
							echo "<p>" . $_GET["mensaje"] . "</p>";
						} ?>
						<form action="validarInsercion.php?esExp=true" method="POST" enctype="multipart/form-data">
							<fieldset>
								<legend>Datos de la experiencia </legend>
								<label for="nombre">Nombre:</label>
								<input type="text" name="nombre" id="nombre"><br><br>
								<label for="descripcion">Descripción:</label>
								<textarea name="descripcion" id="descripcion"></textarea><br><br>		    
								<label for="precio">Precio:</label>
								<input type="number" name="precio" id="precio"><br><br>
								<label for="nivelminimo">Nivel mínimo:</label>
								<select name ="nivelminimo" id="nivelminimo"> 
									<?php
										$result=level::getAllLevels();
										while($row=mysqli_fetch_object($result)){
											echo "<option>$row->nombre</option>";
										}
									?>
								</select>
								<br><br>
								<label for="puntos">Puntos:</label>
								<input type="number" name="puntos" id="puntos"><br><br>
                                <label for="imagen">Selecciona una imagen:</label>
                                <input type="file" name="imagen" id="imagen"><br><br>
								<input type="submit" value="Insertar experiencia">
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