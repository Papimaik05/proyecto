<?php
require_once './includes/config.php';
require_once './includes/Usuario.php';
require_once './includes/level.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Index</title>
    </head>

    <body>

                <?php
                require ('./includes/comun/cabecera.php');
                
                ?>
            <main>
                <div class="container">
                    <h1> Datos de sesión </h1>
                    <ul class="lista-datos">
                        <li class="dato">
                            <span class="dato-titulo">Nombre de usuario:&nbsp;</span>
                            <span class="dato-valor"><?php echo $_SESSION['nombre'] ?></span>
                        </li>
                        <li class="dato">
                            <span class="dato-titulo">Correo electrónico:&nbsp;</span>
                            <span class="dato-valor"><?php echo $_SESSION['email'] ?></span>
                        </li>
                        <li class="dato">
                            <span class="dato-titulo">Nivel:&nbsp;</span>
                            <span class="dato-valor"><?php echo ucfirst($_SESSION['level']) ?></span>
                        </li>
                        <li class="dato">
                            <?php 
                            $nivel = ucfirst($_SESSION['level']);
                            $puntos = $_SESSION['puntos'] - level::getMinPuntos($nivel);
                            $maximo = level::getMaxPuntos($nivel);
                            $porcentaje = ($puntos/($maximo - level::getMinPuntos($nivel))) * 100;
                            $level=level::getLevel($_SESSION["puntos"]);
                            ?>
                            <span class="dato-titulo">Puntos:&nbsp;</span>
                            <div class="barra">
                                <div class="nivel" style="width: 
                                <?php 
                                    if($level==level::poseidon){
                                        $porcentaje=100;
                                        echo $porcentaje;
                                    }
                                    else{
                                        echo $porcentaje;
                                    }
                                ?>%;">
                                </div>
                            </div>
                        </li>
                    </ul>
                    <?php 
                        if($level==level::poseidon){
                            echo "<h3>Felicidades, tienes el nivel máximo!</h3>";
                        }
                        else{
                            ?>
                            <h3>Tienes  
                                <?php echo $_SESSION['puntos'] ?> 
                            puntos (Te quedan 
                                <?php echo ($maximo - $_SESSION['puntos']+1) ?> 
                            para el siguiente nivel)</h3>
                            <?php
                        }
                    ?>
                    <form action="procesarDatos.php" method="post">
                    <fieldset>
                        <legend><b>Actualizar Email</b></legend>
                        Email :<br><input type="email" name="email" > 
                        <br><br>
                        <button type="submit" name="emailnuevo">Actualizar email</button>  
                    </fieldset>
                    <br><br>
                    <form action="procesarDatos.php" method="post">
                    
                    <?php
                    if(isset($_GET['mensaje'])){
                        echo'<h3>'.$_GET["mensaje"].'</h3>';
                    }
                    ?>
                    <fieldset>
                        <legend><b>Actualizar contraseña</b></legend>
                        <br />
                        Contraseña :<br><input type="password" name="contr" > 
                        <br><br>
                        Repita Contraseña :<br><input type="password" name="contr2" > 
                    <br><br>
                    <button type="submit" name="contrnuevo">Actualizar contraseña</button>
                    </fieldset>
                    <br>
                    <a id="link" href="historialpedidos.php" class="button">Historial de pedidos</a>
                </div> 
            </main> 
            <?php
                require('./includes/comun/pie.php');
            ?>        
            
    </body>
</html>