<?php
class Usuario{

    public static function login($username, $password)
    {
        $usuario = self::buscaUsuario($username);
        if ($usuario && $usuario->compruebaPassword($password)) {
            return $usuario;
        }
        return false;
    }
    public static function buscaUsuario($username)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT * FROM usuario U WHERE U.username='%s'", $conn->real_escape_string($username));
        $rs = $conn->query($query);
        if ($rs) {
            $fila = $rs->fetch_assoc();
            if(isset($fila)){
                $user = new Usuario($fila['username'], $fila['password'], $fila['email'], $fila['rol'],$fila['puntos']);
                $rs->free();
                return $user;
            }
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
    }
    public static function borrarUsuario($nombre)
    {
        if (!$nombre) {
            return false;
        }        
        $conn=Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM usuario WHERE username = '%s'"
            , $conn->real_escape_string($nombre)
        );
        if (!$conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }
    public static function cargarUsuarios(){
        $usuarios = [];
        $conn = Aplicacion::getInstance()->getConexionBd();
        if(!$conn){
            exit("Fallo en la conexion");
        }
        $query = "SELECT * FROM usuario";
        $resultado = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado) > 0){
            $i = 0;
            while($fila = $resultado->fetch_assoc()){
                $usuarios[$i] = new Usuario($fila["username"], $fila["password"], $fila["email"], $fila["rol"], $fila["puntos"]);
                $i++;
            }
            $resultado->free();
            return $usuarios; 
        }
        else{
            return false;
        }
    }
      public static function cambioDatos($username, $password, $email,$rol,$puntos)
    {
        $user=self::buscaUsuario($username);
        $user->password=$password;
        $user->email=$email;
        $user->rol=$rol;
        $user->puntos=$puntos;
        self::actualiza($user);
    }

    /*public static function crea($username, $password, $email)
    {
        $user = self::buscaUsuario($username);
        if ($user) {
            return false;
        }
        $user = new Usuario($username,self::hashPassword($password),$email,1,0);
        return self::inserta($user);
    }*/

    public static function crea($username, $password, $email, $rol, $puntos)
    {
        $user = self::buscaUsuario($username);
        if ($user) {
            return false;
        }
        $user = new Usuario($username,self::hashPassword($password),$email,$rol,$puntos);
        return self::inserta($user);
    }
    
    public static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function getNombreRol($rol)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT nombre FROM rol U WHERE U.numero='%d'", $rol);
        $rs = $conn->query($query);
        $fila=$rs->fetch_assoc();
        return $fila['nombre'];
    }
   
    private static function inserta($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO usuario(username,password,email,rol,puntos) VALUES('%s', '%s', '%s', '%d','%d')"
        , $conn->real_escape_string($usuario->username)
        , $conn->real_escape_string($usuario->password)
        , $conn->real_escape_string($usuario->email)
        , $conn->real_escape_string($usuario->rol)
        , $conn->real_escape_string($usuario->puntos)
    );

        if ( $conn->query($query) ) {
            echo "<h2>Inserción con éxito </h2> <br>";
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $usuario;
    }
   
    private static function actualiza($usuario)
    {
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("UPDATE usuario U SET  email='%s' , password='%s',rol='%d',puntos='%d' WHERE U.username='%s'"
            , $conn->real_escape_string($usuario->email)
            , $conn->real_escape_string($usuario->password)
            , $usuario->rol
            , $usuario->puntos
            , $conn->real_escape_string($usuario->username));
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                 echo "No se ha podido actualizar el usuario: " . $usuario->username;
                exit();
             }
        } else {
            echo "Error al actualizar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }

    private $username;

    private $password;

    private $email;

    private $rol;

    private $puntos;

    private function __construct($username, $password, $email, $rol,$puntos)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->rol = $rol;
        $this->puntos = $puntos;
    }

    public function getNombreUsuario()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function getPuntos()
    {
        return $this->puntos;
    }

    public function getContr()
    {
        return $this->password;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
    
}
?>