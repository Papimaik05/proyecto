

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>producto</title>
</head>

<body>
	<?php  
	require ('cabecera.php');
	echo  "<h1>" . $_SESSION["producto"] . "</h1>";

	echo '<img src="' . $_SESSION["imagen"] . '" width="400" height="400">';

	echo  "<h2>" . $_SESSION["precio"] . " € </h2>"; 	
	?>

	<form action="producto.php" method="POST">
	<p>Cantidad: <input type="number" value="1" name="Unidades" width="5" min="1"></p> 
  	<input type="submit" value="Añadir al carrito" name="botonCarrito" <?= compSesion() ?>>
	</form>
	<br>

    <?php 
	if(isset($_REQUEST["botonCarrito"]) && isset($_SESSION["login"]) && $_SESSION["login"] === true){
		anadirCarrito();
		header("Location: paginaCarr.php");
	}
	if(isset($_REQUEST["botonValorar"]) && isset($_SESSION["login"]) && $_SESSION["login"] === true){
		valorar();
		header("Location: paginaProd.php");
	}
	require("pie.php");
	?>

</body>
</html>