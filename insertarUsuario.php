<?php
require_once './includes/config.php';
require_once __DIR__.'/includes/rol.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Registro</title>
    </head>

<body>
<?php
require ('./includes/comun/cabecera.php');
?>
<main>
<div class="container">
    <?php
    if(isset($_GET["mensaje"])){
    echo'<h3>'.$_GET["mensaje"].'</h3>';
    }
    ?>
    <div class="insertarProductos">
		<article>
			<form action="validarInsercion.php?esUs=true" method="POST">
			<fieldset>
				<legend>Datos del producto </legend>
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" id="nombre"><br><br>
                <label for="email">Email:</label>
			    <input type="text" name="email" id="email"><br><br>
                <label for="contr">Contraseña:</label>
				<input type="password" name="contr" id="contr"><br><br>
                <label for="contr2">Repita Contraseña:</label>
				<input type="password" name="contr2" id="contr2"><br><br>
                              
                <label for="rol">Rol:</label>
                <select name ="rol" id="rol">
                <?php
                    $result=rol::getAllRols();
                    while($row=mysqli_fetch_object($result)){
                    echo "<option>$row->nombre</option>";
                    }
                ?>
                </select> <br><br>

                <label for="puntos">Puntos:</label>
				<input type="number" name="puntos" id="puntos" min="0"><br><br>
                <input type="submit" value="Insertar Usuario">
			</fieldset>
			<br><br><br>   
			</form>
	    </article>
	</div>
</div> 
</main> 
<?php
    require('./includes/comun/pie.php');
?>            
</body>
</html>