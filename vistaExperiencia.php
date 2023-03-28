<?php 
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/experiencias.php';
require_once __DIR__.'/includes/level.php';
require_once './includes/Usuario.php';
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
	$experiencia = Experiencia::buscaPorId($id);
	echo "<h1>" . $experiencia->getNombre() . "</h1>";
	echo '<img src="' . $experiencia->getImagen() . '" width="400" height="400">';
	echo "<h3>". $experiencia->getDescripcion() ."</h3>";
	echo "<h3> Nivel minimo requerido: ". ucfirst(level::getNombre($experiencia->getNivelMinimo()))."</h3>";
	echo "<h2>" . $experiencia->getPrecio() . " € </h2>"; 	
	echo $usuario=Usuario::buscaUsuario($_SESSION["nombre"]);
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true) && (level::getLevel($usuario->getPuntos())>=$experiencia->getNivelMinimo())){ 
		?>
		<button onclick='window.location.href="gestorProductos.php"' type='button' > Comprar</button>
		<?php 
	}
	?>
	<br>

    <?php 
	require('./includes/comun/pie.php');
	?>

</body>
</html>