<?php

include("conexion.php");

    if(isset($_POST["comuna"])){

        $comuna = $_POST['comuna'];
        $rbd = $_POST['rbd'];
    
            $query = "SELECT RBD, Dependencia, Comuna, Colegio FROM rbd WHERE Comuna LIKE '%$comuna%'";
            $link = conexion::conecta();
            mysqli_query($link, $query);
    
            $nfilas = mysqli_affected_rows($link);
    
            return $nfilas;
    
            mysqli_close($link);
        
    }


?>
