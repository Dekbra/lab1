<?php   
include "conexion.php";
include "header.php";


if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coso</title>
    <link rel="stylesheet" href="tabla.css"> 
</head>
<body>
    

    <?php 
       
        $listvideoj = $conexion->query('SELECT * from videojuegos');

        
        if ($listvideoj->num_rows > 0) {
            
            echo '
                <table>
                  <thead>
                     <tr>
                       <th>Nombre</th>
                       <th>Género</th>
                       <th>Compañía</th>
                       <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>';

           
            while($fila = $listvideoj->fetch_assoc()){
                echo "<tr>
                       <td>{$fila['nombre']}</td>
                       <td>{$fila['genero']}</td>
                       <td>{$fila['compania']}</td>
                       <td>
                           <a href='editar.php?id={$fila['id']}'>Editar</a>
                           <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
                       </td>
                     </tr>";
            }

            
            echo '
                </tbody>
            </table>';
        } else {
            
            echo "<p>No hay datos disponibles en la base de datos.</p>";
        }
    ?>  

   
    <a href="registrar.php">
        <button>Registrar</button>
    </a>
</body>
</html>
<?php include "footer.php";