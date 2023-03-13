<?php
class Usuario{

    public static function login($username, $password)
    {
        $usuario = self::buscaUsuario($username);
        if ($usuario && $usuario->compruebaPassword2($password)) {
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
    
    public static function crea($username, $password, $email)
    {
        $user = self::buscaUsuario($username);
        if ($user) {
            return false;
        }
        $user = new Usuario($username, $password,$email,1,0);
        return self::guarda($user);
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private static function cargaRoles($usuario)
    {
        $roles=[];
            
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT RU.rol FROM RolesUsuario RU WHERE RU.usuario=%d"
            , $usuario->id
        );
        $rs = $conn->query($query);
        if ($rs) {
            $roles = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();

            $usuario->roles = [];
            foreach($roles as $rol) {
                $usuario->roles[] = $rol['rol'];
            }
            return $usuario;

        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return false;
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
        $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE U.id=%i"
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->password)
            , $conn->real_escape_string($usuario->rol)
            , $usuario->id);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->id;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        
        return $usuario;
    }
   
    
    private static function borra($usuario)
    {
       
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
    

    public function añadeRol($rol)
    {
        $this->rol = $rol;
    }


    public function tieneRol($role)
    {
        if ($this->roles == null) {
            self::cargaRoles($this);
        }
        return array_search($role, $this->roles) !== false;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function compruebaPassword2($password)
    {
        if($password==$this->password){
            return true;
        }
        else{
            return false;
        }
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
    
    public static function guarda($usuario)
    {
        $user = self::buscaUsuario($usuario->username);
        if ($user) {
            return self::actualiza($user);
        }
        return self::inserta($usuario);
    }

}
?>