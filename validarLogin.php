<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>validarLogin</title>
    </head>

<body>
    <div style="text-align:center;">
            <?php
            require ('cabecera.php');
            ?>
	    <main>
	        <article>  
                <br><br><br>
                <?php
                $dbhost="localhost";
                $dbuser="root";
                $dbpass="";
                $dbname="proyecto";

                $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

                if(!$conn){
                    exit("Fallo en la conexion");
                }

                $nombre=$_POST["nombre"];
                $contr=$_POST["contr"];

                $query="SELECT * FROM login WHERE username='$nombre' AND password='$contr'";
                $resultado=mysqli_query($conn, $query);

                if(mysqli_num_rows($resultado)==1){
                echo "<h2>Acceso Correcto</h2>";
                echo "Bienvenido <b>$nombre<b>";    
                }
                else{
                echo "<h2>Acceso Denegado</h2>";
                echo "No hay nadie registrado con ese nombre";
                echo "Haz click aqui";
                }
                ?>
            <br><br><br><br><br>
        </form>
	        </article>
	    </main> 
        <?php
            require('pie.php');
        ?>        
    </div>     
</body>
</html>