<?php
require_once './includes/config.php';
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
<div class="container" id="login">
    <div class="formulario">
        <h1>Registro</h1>
        <article>  
        <form action="validarInsercionUsuario.php" method="post">
            <div class="username">
                <input type="text" name="nombre" >
                <label>Nombre de Usuario</label>
            </div>
            <div class="username">
                <input type="text" name="email" >
                <label>Email</label>
            </div>
            <div class="username">
                <input type="password" name="contr" >
                <label>Contraseña</label>
            </div>
            <div class="username">
                <input type="password" name="contr2" >
                <label>Repetir contraseña</label>
            </div> 
            <?php
            if(isset($_GET["error"])){
                echo'<h3>'.$_GET["error"].'</h3>';
            }
            ?>    
            <br>
            <button type="submit" name="registro">Registrar</button>
            <br>
        </form>
        </article>
    </div>

    <div class="insertarProductos">
					<article>
						<?php if (isset($_GET["mensaje"])) {
							echo "<p>" . $_GET["mensaje"] . "</p>";
						} ?>
						<form action="validarInsercionUsuario.php" method="POST">
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
								<input type="submit" value="Insertar Usuario">
                                <label for="rol">Rol:</label>
								<input type="number" name="unidades" id="unidades" min="0"><br><br>
                                <label for="puntos">Puntos:</label>
								<input type="number" name="puntos" id="puntos" min="0"><br><br>
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