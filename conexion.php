<?php
    $conexion = mysqli_connect(
    hostname: "localhost" , username: "root",password: "",database: "labo1");

    if(mysqli_connect_error()){
        die("Error: ".mysqli_connect_error());
    }
    else{
        echo "Coneccion realizada correctamente";
    }

?>