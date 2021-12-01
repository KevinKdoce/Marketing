<?php

include("conexion.php");
    
            $query = "SELECT RBD, Comuna, Colegio FROM rbd";
            $link = conexion::conecta();
            mysqli_query($link, $query);
    
            $nfilas = mysqli_affected_rows($link);
    
            return $nfilas;
    
            mysqli_close($link);

?>