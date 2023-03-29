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
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Experiencia</title>
</head>

<body>
	<?php  
	require ('./includes/comun/cabecera.php');

	$id = $_GET["id"];
	$username=$_SESSION["nombre"];
	function ejecutacompra(){
		compraexperiencia::compraExp($username,$id);

	}
	$experiencia = Experiencia::buscaPorId($id);

	echo "<h1>" . $experiencia->getNombre() . "</h1>";
	echo '<img src="' . $experiencia->getImagen() . '" width="400" height="400">';
	echo "<h3>". $experiencia->getDescripcion() ."</h3>";
	echo "<h3> Nivel minimo requerido: ". ucfirst(level::getNombre($experiencia->getNivelMinimo()))."</h3>";
	echo "<h2>" . $experiencia->getPrecio() . " € </h2>"; 	
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && (level::getLevel($_SESSION["puntos"])>=$experiencia->getNivelMinimo())){ 
		
		 echo "<button onclick='ejecutacompra()' type='button' > Comprar</button>";
		 echo "<br><br>"; 
	}
	else{
		echo "<h2>No tienes el nivel minimo requerido</h2>";
	}
	?>
	<br>

    <?php 
	require('./includes/comun/pie.php');
	?>

</body>
</html>