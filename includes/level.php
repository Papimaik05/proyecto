<?php
class level{
    public const cangrejo = 0;
    public const delfin = 1;
    public const megalodon = 2;
    public const poseidon = 3;
    private $puntos;

    private static function getLevel($puntos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT RU.rol FROM nivel RU WHERE RU.usuario=%d"
            , $usuario->id
        );
        $rs = $conn->query($query);
    }

}

?>