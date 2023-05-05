<?php
require_once './includes/config.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css?id=3" />
        <title>Registro</title>
    </head>

<body>
<?php
require ('./includes/comun/cabecera.php');
?>
<main>
<div class="container" id="login">
    <div class="registro">
        <h1>Registro</h1>
        <article>  
        <form action="procesarRegistro.php" method="post">
            <fieldset id="reg">
                    <div><label>Usuario:</label> <input required type="text" name="nombre" id="campoUser" />
						<span id="validUser"></span> </div>
					<div><label>Correo:</label> <input required type="email" name="email" id="campoEmail" />
						<span id="validEmail"></span></div>	
					<div><label>Contraseña:</label> <input required type="password" name="contr" /><br /></div>
                    <div><label>Repita Contraseña:</label> <input required type="password" name="contr2" /><br /></div>
                    <?php
                    if(isset($_GET["error"])){
                        echo'<h3>'.$_GET["error"].'</h3>';
                    }
                    ?>
                    <br>
					<div><button type="submit" name="registro">Registrar</button></div>    
            </fieldset>
            <br>
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