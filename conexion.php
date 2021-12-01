<?php

class conexion
{

    public static function conecta()
    {

        $server = "localhost";
        $user = "root";
        $pass = "root";
        $bd = "kdoce_rbd"; 

        try {
            $conexion = mysqli_connect($server, $user, $pass, $bd);
            return $conexion;
        } catch (mysqli_sql_exception $error) {
            print $error->getMessage();
            exit();
        }
    }
}

?>
