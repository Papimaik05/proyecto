<?php 
	function anadirCarrito(){
		$experiencia = $_SESSION["experiencia"];
		if(!isset($_SESSION["carrito"][$experiencia])){
		$_SESSION["carrito"][$experiencia]["img"] = $_SESSION["img"];
		$_SESSION["carrito"][$experiencia]["producto"] = $_SESSION["producto"];
		$_SESSION["carrito"][$experiencia]["precio"] = $_SESSION["precio"];
		}
	}

	function permitirComprar(){
		if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
			echo "enabled";
		}
		else{
			echo "disabled";
		}
	}
?>

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

	echo  "<h1>" . $_SESSION["experiencia"] . "</h1>";
	echo '<img src="' . $_SESSION["img"] . '" width="400" height="400">';
	echo  "<h2>" . $_SESSION["precio"] . " € </h2>"; 	
	?>

	<form action="experiencias.php" method="POST">
	<p>Cantidad: <input type="number" value="1" name="Unidades" width="5" min="1"></p> 
  	<input type="submit" value="Añadir al carrito" name="botonCarrito" <?= permitirComprar() ?>>
	</form>
	<br>

    <?php 
	if(isset($_REQUEST["botonCarrito"]) && isset($_SESSION["login"]) && $_SESSION["login"] === true){
		anadirCarrito();
		header("Location: paginaCarr.php");
	}

	require("pie.php");
	?>

</body>
</html>