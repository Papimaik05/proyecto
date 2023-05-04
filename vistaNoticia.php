<?php
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Noticia.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<link href= "./css/style.css" rel="stylesheet" type="text/css">
		<title>Noticia</title>
	</head>

	<body>

		<?php  
			require ('./includes/comun/cabecera.php');
		?>
		<div class="container">
		<div class="noticias">
		
        <?php
        $id = $_GET["id"];
        $noticia = Noticia::buscaPorId($id);
        echo "<h1>" . $noticia->getTitulo() . "</h1>";
		echo '<img  src="' . $noticia->getImagen() . ' " id="imgNoticia" alt="noticia" >';
		echo "<h3>". $noticia->getDescripcion() ."</h3>";
		echo $noticia->getFecha();	
            	

        ?>
		<br>
		</div>
		</div>
		<?php 
		require('./includes/comun/pie.php');
		?>

	</body>
</html>




