<?php 
	function anadirCarrito(){
		$producto = $_SESSION["producto"];
		if(!isset($_SESSION["carrito"][$producto])){
		$_SESSION["carrito"][$producto]["img"] = $_SESSION["img"];
		$_SESSION["carrito"][$producto]["producto"] = $_SESSION["producto"];
		$_SESSION["carrito"][$producto]["precio"] = $_SESSION["precio"];
		$_SESSION["carrito"][$producto]["unidades"] = $_REQUEST["unidades"];
		}
		else{
			$_SESSION["carrito"][$producto]["unidades"] += $_REQUEST["unidades"];
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

	echo  "<h1>" . $_SESSION["producto"] . "</h1>";
	echo '<img src="' . $_SESSION["img"] . '" width="400" height="400">';
	echo  "<h2>" . $_SESSION["precio"] . " € </h2>"; 	
	?>

	<form action="producto.php" method="POST">
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