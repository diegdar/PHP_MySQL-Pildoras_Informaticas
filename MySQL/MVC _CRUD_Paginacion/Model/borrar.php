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

require_once("conectar.php");

    // El '$_GET["id"]' sera el valor que recibiremos por la url de index.php de la fila donde se hizo click al boton borrar
    $id = $_GET["id"];

    $conecta = conectar::conexion(); //Crea una instancia de la clase para utilizar el metodo conexion()

    // Instruccion SQL para borrar el registro de la BBDD
    $sql_borrar = "DELETE FROM DATOS_USUARIOS WHERE ID=:id";

    // Preparacion consulta
    $resultado = $conecta->prepare($sql_borrar);

    // Vincula el valor del parámetro "$id" a la consulta
    $resultado->bindParam(":id", $id, PDO::PARAM_INT);

    // Ejecucion consulta
    $resultado->execute(); 

    // Para que no se quede aqui en esta pagina, redirigimos a la pagina index de nuevo
    header("location:../index.php");

?>
</body>
</html>