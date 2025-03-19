<<?php   
include "conexion.php";

 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $resultado = $conexion->query("SELECT * FROM videojuegos
                        WHERE id=$id");
        $videojuego = $resultado->fetch_assoc();
    }
    

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
        <input type="text" name="nombre"
        value="<?php echo $videojuego['nombre']?>">
        <label for="">genero</label>
        <input type="text" name="genero"
        value="<?php echo $videojuego['genero']?>">>
        <label for="">compania</label>
        <input type="text" name="compania"
        value="<?php echo $videojuego['compania']?>">>
        <button typer="submit">registrar</button>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nombre = $_POST['nombre'];
            $genero = $_POST['genero'];
            $compania = $_POST['compania'];

            $insertar = $conexion->prepare(query: "UPDATE videojuegos SET nombre=?,genero=?,compania=? WHERE id=$id");

            $insertar->bind_param('sss', $nombre,$genero,$compania);
            $insertar->execute();
            header("Location:index.php");

        }
    ?>
</body>
</html>

<?php include "footer.php";