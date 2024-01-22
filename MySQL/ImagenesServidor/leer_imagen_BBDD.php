<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require("datos_conexion.php");

    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    // Designa codigo latino utf8
    mysqli_set_charset($conexion, "utf8");

    $consulta = "SELECT FOTO FROM PRODUCTOS WHERE idProducto = '100884807' ";

    // EJECUCIÓN DE LA CONSULTA     
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        // Guarda en la variable las rutas de las imagenes de cada registro
        $ruta_img = $fila["FOTO"];

    }

    ?>

    <div>
        <img src="/uploads<?php echo $ruta_img;?>" alt="imagen del primer articulo" width="25%">
    </div>
</body>
</html>