<?php   
include "conexion.php";
include "header.php"; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">nombre</label>
        <input type="text" name="nombre">
        <label for="">genero</label>
        <input type="text" name="genero">
        <label for="">compania</label>
        <input type="text" name="compania">
        <button typer="submit">registrar</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $compania = $_POST['compania'];

            $insertar = $conexion->prepare(query: 'INSERT INTO videojuegos (nombre,genero,compania)VALUES(?,?,?)');

            $insertar->bind_param('sss', $nombre,$genero,$compania);
            $insertar->execute();
            header("Location:index.php");

        }
    ?>



</body>
</html>
<?php include "footer.php";