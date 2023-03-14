<?php
class level{
    public const cangrejo = 0;
    public const delfin = 1;
    public const megalodon = 2;
    public const poseidon = 3;

    private static function getLevel($puntos){
        $conn = Aplicacion::getInstance()->getConexionBd();
        $query = sprintf("SELECT numero FROM nivel U WHERE $puntos<=U.maximo AND $puntos>=U.minimo");
        $rs = $conn->query($query);
        return $rs;
    }

}

?>