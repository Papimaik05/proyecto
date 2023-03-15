<?php 
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/experiencias.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Experiencia</title>
</head>

<body>
	<?php  
	require ('cabecera.php');
	$id = $_GET["id"];
	$experiencia = Experiencia::buscaPorId($id);

	echo  "<h1>" . $experiencia->getNombre() . "</h1>";
	echo '<img src="' . $experiencia->getImagen() . '" width="400" height="400">';
	echo "<h3>". $experiencia->getDescripcion() ."<h3>";
	echo  "<h2>" . $experiencia->getPrecio() . " € </h2>"; 	
	?>
	<br>

    <?php 

	require("pie.php");
	?>

</body>
</html>