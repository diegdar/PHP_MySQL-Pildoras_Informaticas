<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

    // Instruccion para que intente hacer el codigo que se encuentra dentro
    try{

        // INTANCIACION DE LA CLASE PDO
        $base = new PDO("mysql:host=localhost; dbname=prueba", "root", ""); // servidor; BBDD, usuario, contraseña

        echo "Conexión realizada!";

    // En caso de que no se pueda hacer la conexion por un error de excepcion
    }catch(Exception $error){ // se ejecuta si hay un error
        
        // Mata el error por defecto y nos muestra uno personalizado con el codigo final del error
        die("Error: " . $error->GetMessage());

    // Libera recursos que hemos ido consumiendo
    }finally{ //finally se ejecutaria siempre, haya un error o no

        // vacia la memoria
        $base = null;

    }

?>
</body>
</html>