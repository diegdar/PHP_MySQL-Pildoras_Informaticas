<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    include("conexion.php");

    // El '$_GET["id"]' sera el valor que recibiremos por la url de index.php de la fila donde se hizo click al boton borrar
    $id = $_GET["id"];

    // Instruccion SQL para borrar el registro de la BBDD
    $base->query("DELETE FROM DATOS_USUARIOS WHERE ID='$id'");

    // Para que no se quede aqui en esta pagina, redirigimos a la pagina index de nuevo
    header("location:index.php");

?>