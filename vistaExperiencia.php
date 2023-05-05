<?php 
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Experiencia.php';
require_once __DIR__.'/includes/level.php';
require_once './includes/Usuario.php';
require_once './includes/compraexperiencia.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<link href= "./css/style.css" rel="stylesheet" type="text/css">
		<title>Experiencia</title>
	</head>

	<body>

		<?php  
			require ('./includes/comun/cabecera.php');
		?>
		<div class="container">
		<?php

			$id = $_GET["id"];
			$experiencia = Experiencia::buscaPorId($id);

			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) ){ 
				$username=$_SESSION["nombre"];
				$puntos=$_SESSION["puntos"]+$experiencia->getPuntos();

				if(isset($_POST['submit'])) {
					
					$encontrado = false;
					foreach ($_SESSION['carrito'] as $key => $producto) {
						if ($producto['id'] == $id && $producto['tipo'] == 'experiencia') {							
							$encontrado = true;
							break;
						}
					}

					if (!$encontrado) {
						$_SESSION['carrito'][] = array(
							'id' => $id,
							'unidades' => 1,
							'precio' => $experiencia->getPrecio(),
							'tipo' => 'experiencia'
						);
					}
				
					header("Location:vistaCarrito.php");
				}
	
			}
			
			echo "<h1>" . $experiencia->getNombre() . "</h1>";
			echo '<img  src="' . $experiencia->getImagen() . ' " id="imgExperiencia" alt="experiencia" >';
			echo "<h3>". $experiencia->getDescripcion() ."</h3>";
			echo "<h3> Nivel minimo requerido: ". ucfirst(level::getLevelByNumero($experiencia->getNivelMinimo())->getNombre())."</h3>";
			echo "<h2>" . $experiencia->getPrecio() . " € </h2>"; 
			echo "<h3>Esta experiencia otorga: "  . $experiencia->getPuntos() . " Puntos </h3>";
			if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && (level::getLevel($_SESSION["puntos"])->getNumero()>=$experiencia->getNivelMinimo())){ 
				?>
				<form method="post">
				<input type="submit" name="submit" value="Comprar"id="botoncompra">
				</form> 
				<?php
			}
			else{
				if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) ){
					echo "<h2>No tienes el nivel minimo requerido</h2>";
				}
				else{
					echo "<h2>Debes iniciar sesion para comprar una experiencia</h2>";
				}

			}
		?>
		<br>
		</div>
		<?php 
		require('./includes/comun/pie.php');
		?>

	</body>
</html>