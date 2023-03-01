<?php
$usuario= $_POST['usuario'];
$contraseña= $_POST['contraseña'];
$servername = "localhost";
$username = "usuario";
$password = "usuario";
$db = "cuentas";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    else{

        $consulta="SELECT * FROM users WHERE usuario='$usuario' and contraseña='$contraseña'";
        $resultado=mysqli_query($conn,$consulta);

        $filas=mysqli_num_rows($resultado);
        mysqli_close($conn);
        if($filas>0){
            session_start();
            $_SESSION["usuario"]=$username;
            $_SESSION["login"]=true;
             header("location:index.php");
        }else{
            $error="Usuario o contraseña incorrectos";
            header("location:login.php?error=$error");
        }

    }
 ?>