<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Index</title>
    </head>

<body>
    <div style="text-align:center;">
            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <br>          
                <img src="./img/logo.jpg"  width ="580"  height ="480"  alt="logotipo">
                <br>
                <button onclick="window.location.href='login.php'" type="button"  > Inicio de Sesión</button>
		        <button onclick="window.location.href='registro.php'" type="button" > Registrate</button>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
    </div>     
</body>
</html>