<?php
	function producto(){
	$producto = htmlspecialchars(trim(strip_tags($_REQUEST["producto"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$img = htmlspecialchars(trim(strip_tags($_REQUEST["img"])));
	$_SESSION["producto"] = $producto;
	$_SESSION["precio"] = $precio;
	$_SESSION["img"] = $imagen;
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link href= "./css/style.css" rel="stylesheet" type="text/css">
    <title>Tienda</title>
</head>

<body>
    <?php
        require ('cabecera.php');
    ?>

    <h1>Tienda</h1>
    <br>
<div class="experiencias">
    <h2>Experiencias</h2>
    <section>
        <img src="./img/pesca_inaki.jpg">
        <img src="./img/pinguinos_madagascar.jpg">
        <img src="./img/nemo.jpg">
        <img src="./img/jaula_tiburones.jpg">
    </section>
</div>
<br><br><br><br>


<div class="equipamiento">
<h2>Equipamiento</h2>

<form action="tienda.php" method="POST">
<input type="hidden" name="producto" value="AletasSuperBlast">
<input type="hidden" name="precio" value="20">
<input type="hidden" name="img" value="./img/alets.jpg">
<img src="./img/aletas.jpg" width="200" alt = "aletas" height="200">
<h3>Aletas SuperBlast </h3>
<p>Aletas de material resistente para nadar a toda velocidad. Se el más molón del mar con las aletas SuperBlast.</p>
<input type="submit" value="Ver producto" name="botonComprar">
</form>
<br><br><br><br>

<img src="./img/snorkel.jpg" width="200" alt = "snorkel" height="200">
<h3>Snorkel UltraPower  &nbsp; <a href="index.php">Comprar</a></h3>
<p>Gafas y snorkel de polietileno y titaneo parar resispar sin parar.</p>
<br><br><br><br>

<img src="./img/submarino.jpg" width="200" alt = "submarino" height="200">
<h3>Submarino el Coloso  &nbsp; <a href="index.php">Comprar</a></h3>
<p>Submarino premium delux ideal para disfrutar de nuestras excursiones con el mayor confort imaginado.</p>
<p>Surca los mares descubriendo sus profundidades gracias a la más última tecnolodia de este navío.</p>
</div>

<?php 
	if(isset($_REQUEST["botonComprar"])){
		producto();
		header("Location: producto.php ");
	}
    require('pie.php');
?>

</body>
</html>