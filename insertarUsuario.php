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
                    <legend>Datos del usuario</legend>
                    <div><label>Usuario:</label> <input required type="text" name="nombre" id="campoUser" />
						<span id="validUser"></span> </div>
					<div><label>Correo:</label> <input required type="email" name="email" id="campoEmail" />
						<span id="validEmail"></span></div>	
					<div><label>Contraseña:</label> <input required type="password" name="contr" /><br /></div>
                    <div><label>Repita Contraseña:</label> <input required type="password" name="contr2" /><br /></div>                        
                    <label for="rol">Rol:</label>
						<select name ="rol" id="rol"> 
							<?php						
								$rols=rol::getAllRols();
								foreach($rols as $rol){
								$nombre = $rol->getNombre();
								echo "<option>$nombre</option>";
								}
							?>
						</select>
					<br><br>
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
<script type="text/javascript" src="js/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="js/registro.js"></script>            
</body>
</html>