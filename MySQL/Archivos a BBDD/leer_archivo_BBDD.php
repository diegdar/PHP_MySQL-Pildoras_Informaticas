<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $id = "";
    $contenido = "";
    $tipo = "";

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

    $consulta = "SELECT * FROM ARCHIVOS WHERE Id = '2' ";

    // EJECUCIÓN DE LA CONSULTA     
    $resultado = mysqli_query($conexion, $consulta);

    while($fila = mysqli_fetch_array($resultado)){
        
        $id = $fila["Id"];
        $contenido = $fila["Contenido"];
        $tipo = $fila["Tipo"];

    }

    echo "Id: " . $id . "<br>";
    echo "Tipo" . $tipo . "<br>";


    echo "<img src='data:image/jpeg; base64," . base64_encode($contenido) . "'>";

    ?>

</body>
</html>