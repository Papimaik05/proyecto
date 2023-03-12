<?php
$formEnviado = isset($_POST['registro']);
if (! $formEnviado ) {
	header('Location: registro.php');
	exit();
} 
?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>procesarRegistro</title>
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
                 $nombre=$_POST["nombre"];
                 $contr=$_POST["contr"];
                 $contr2=$_POST["contr2"];
                if($contr==$contr2){
                    $dbhost="localhost";
                    $dbuser="root";
                    $dbpass="";
                    $dbname="proyecto";
    
                    $conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    
                    if(!$conn){
                        exit("Fallo en la conexion");
                    }

                    $query="INSERT INTO login(username,password,esadmin) VALUES ('$nombre','$contr','false')";
                    if($conn->query($query)){
                        // $conn->query($query) == mysqli_query($conn, $query) ES EXACTAMENTE LO MISMO
                         echo "<h2>Se ha dado de alta el usuario $nombre </h2>";
                    }
                }
                else{
                    echo "<h2>LAS CONTRASEÑAS NO COINCIDEN</h2>";
                    
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