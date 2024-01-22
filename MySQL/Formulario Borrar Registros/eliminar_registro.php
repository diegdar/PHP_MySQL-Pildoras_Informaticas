<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr, td{
            border: 1px solid red;

        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    
<?php

    $fecha_apunt = $_GET["f_apunt"];
    $fecha_amort = $_GET["f_amort"]; 
    $detalle = $_GET["detalle"];
    $subconcepto = $_GET["subconceto"];
    $concepto = $_GET["concepto"];
    $subimporte = $_GET["subImporte"];
    $importe_ing = $_GET["impor_ing"];
    $id_registro = $_GET["id_registro"];

    require("..\datos_conexion.php");

    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

    // Permite trabajar con caracteres latinos
    mysqli_set_charset($conexion, "utf8");

    // CONSULTA SQL
    $consulta = "DELETE FROM registro_banco WHERE ID_Registro='$id_registro'"; // los que estan con comillas simples es porque son tipo texto

    // EJECUCIÓN DE LA CONSULTA
    $resultados = mysqli_query($conexion, $consulta);

    if($resultados == false){
        echo "Error en la consulta";
    }else{
        // si el valor de la funcion mysqli_affected_rows es igual a 0 es porque no ha eleminado registros
        if(mysqli_affected_rows($conexion) == 0){
            echo "No hay registros que eliminar con este criterio";
        }else if(mysqli_affected_rows($conexion) == 1){
            echo "Se ha eliminado " . mysqli_affected_rows($conexion) . " registro";
        }else{
            echo "Se han eliminado " . mysqli_affected_rows($conexion) . " registros";
        }
    }

    // Cierra la conexion para liberar los recursos del servidor y mejora el rendimiento general del sistema, ademas de evitar problemas de seguridad.
    mysqli_close($conexion);


?>

</head>
<body>
    
</body>
</html>