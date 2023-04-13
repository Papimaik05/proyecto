<?php 
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/experiencias.php';
require_once __DIR__.'/includes/level.php';
require_once './includes/Usuario.php';
require_once './includes/compraexperiencia.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "http://localhost/proyecto/assets/style.css" rel="stylesheet" type="text/css">
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
			compraexperiencia::compraExp($username,$id,$puntos);
			$_SESSION["puntos"]=$puntos;
			$_SESSION["level"]=level::getNombre(level::getLevel($_SESSION["puntos"]));
			header("Location:felicitaciones.php");
    	}
	}
	
	echo "<h1>" . $experiencia->getNombre() . "</h1>";
	echo '<img src="' . $experiencia->getImagen() . '" id="imgExperiencia">';
	echo "<h3>". $experiencia->getDescripcion() ."</h3>";
	echo "<h3> Nivel minimo requerido: ". ucfirst(level::getNombre($experiencia->getNivelMinimo()))."</h3>";
	echo "<h2>" . $experiencia->getPrecio() . " € </h2>"; 	
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && (level::getLevel($_SESSION["puntos"])>=$experiencia->getNivelMinimo())){ 
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