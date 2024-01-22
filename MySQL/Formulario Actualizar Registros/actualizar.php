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

    $fecha_apunt = $_GET["FECHA_APUNTE"];
    $fecha_amort = $_GET["FECHA_AMORTIZACION"]; 
    $detalle = $_GET["DETALLE"];
    $subconcepto = $_GET["SUBCONCEPTO"];
    $concepto = $_GET["CONCEPTO"];
    $subimporte = $_GET["SUBIMPORTE"];
    $importe_ing = $_GET["IMPORTE_ING"];
    $id_registro = $_GET["ID_Registro"];

    require("..\datos_conexion.php");

    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

    // Permite trabajar con caracteres latinos
    mysqli_set_charset($conexion, "utf8");

    // CONSULTA SQL
    $consulta = "UPDATE registro_banco SET FECHA_APUNTE=$fecha_apunt, FECHA_AMORTIZACION=$fecha_amort, DETALLE='$detalle', SUBCONCEPTO='$subconcepto', CONCEPTO='$concepto', SUBIMPORTE=$subimporte, IMPORTE_ING=$importe_ing, ID_Registro='$id_registro' WHERE ID_Registro='$id_registro' "; // los que estan con comillas simples es porque son tipo texto - el WHERE hay que ponerlo para que no actualice todos los campos sino solo aquellos que tengan el id_registro que se cambio

    // EJECUCIÓN DE LA CONSULTA
    $resultados = mysqli_query($conexion, $consulta);

    if($resultados == false){
        echo "Error en la consulta";
    }else{
        echo "<h1>Registro guardado:</h1> <br>";
        echo "<table>";
        echo "<tr><td>$fecha_apunt</td></tr>";
        echo "<tr><td>$fecha_amort</td></tr>";
        echo "<tr><td>$detalle </td></tr>";
        echo "<tr><td>$subconcepto</td></tr>";
        echo "<tr><td>$concepto</td></tr>";
        echo "<tr><td>$subimporte </td></tr>";
        echo "<tr><td>$importe_ing</td></tr>";
        echo "<tr><td>$id_registro</td></tr>";
        echo "</table>";
    }

    // Cierra la conexion para liberar los recursos del servidor y mejora el rendimiento general del sistema, ademas de evitar problemas de seguridad.
    mysqli_close($conexion);


?>

</head>
<body>
    
</body>
</html>