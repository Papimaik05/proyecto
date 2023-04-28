<?php
require_once "Aplicacion.php";
require_once 'config.php';
class comentario{
private $id;
private $usuario;
private $padre;
private $contenido;
private $fecha_de_creacion;
private $meGusta;
private $titulo;

public function __construct($id=null,$titulo,$usuario,$padre,$contenido,$fecha_de_creacion, $meGusta){
    $this->id=$id;
    $this->titulo=$titulo;
    $this->usuario=$usuario;
    $this->padre=$padre;
    $this->contenido=$contenido;
    $this->fecha_de_creacion=$fecha_de_creacion;
    $this->meGusta = $meGusta;
}


public static function cargarComentarios(){
    $comentarios=[];
    $conn = Aplicacion::getInstance()->getConexionBd();
    if(!$conn){
        exit("Fallo en la conexion");
        return false;
    }

    $query = sprintf("SELECT * FROM comentario ORDER BY me_gusta DESC");
    $resultado = mysqli_query($conn, $query);
    $i = 0;
    if(mysqli_num_rows($resultado) > 0){
       
        while($fila = $resultado->fetch_assoc()){
            $comentarios[$i] = new comentario($fila["id"], $fila["titulo"], $fila["usuario"], $fila["padre"], $fila["contenido"], $fila["fecha_de_creacion"], $fila["me_gusta"]);
            $i++;
        }
        $resultado->free();
    }

    return $comentarios;


}

public function getUsuario(){
    return $this->usuario;
}


public function getTitulo(){
    return $this->titulo;
}


public function getContenido(){
    return $this->contenido;
}

public function getFecha(){
    return $this->fecha_de_creacion;
}

public function getPadre(){
    return $this->padre;
}
public function getId(){
    return $this->id;
}

public function getMeGusta(){
    return $this->meGusta;
}



public static function buscaPorId($idComentario){
    
    $conn = Aplicacion::getInstance()->getConexionBd();
    $query = sprintf("SELECT * FROM comentario WHERE id='%d'", $idComentario);
    $rs = $conn->query($query);
    if ($rs) {
        $fila = $rs->fetch_assoc();
        $comentario = new comentario($fila["id"],$fila["titulo"], $fila["usuario"], $fila["padre"], $fila["contenido"], $fila["fecha_de_creacion"], $fila["me_gusta"]);
        $rs->free();
        return $comentario;
    } else {
        error_log("Error BD ({$conn->errno}): {$conn->error}");
    }
    return false;


}

    private static function inserta($comentario)
    {
        $result = false;
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query=sprintf("INSERT INTO comentario(titulo, usuario, padre, contenido, fecha_de_creacion, me_gusta) VALUES ('%s', '%s', '%d', '%s', '%s','%d')"
            , $conn->real_escape_string($comentario->titulo)
            , $conn->real_escape_string($comentario->usuario)
            , $comentario->padre
            , $conn->real_escape_string($comentario->contenido)
            , $comentario->fecha_de_creacion
            , $comentario->meGusta
        );
        if ( $conn->query($query) ) {
            $comentario->id = $conn->insert_id;
            $result=true;
        } else {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
        }
        return $result;
    }

    public function guarda()
    {
        return self::inserta($this);
    }
    public static function crea($usuario,$padre,$contenido,$fecha_de_creacion, $meGusta)
    {
        $noticia = new comentario(null,$usuario,$padre,$contenido,$fecha_de_creacion, $meGusta);
        return $noticia->guarda();
    }

    
    public static function borraPorId($idComentario)
    {
        if (!$idComentario) {
            return false;
        } 
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("DELETE FROM comentario WHERE id = '%d'"
            , $idComentario
        );
        if ( ! $conn->query($query) ) {
            error_log("Error BD ({$conn->errno}): {$conn->error}");
            return false;
        }
        return true;
    }

}







?>