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
    $consulta = "INSERT INTO registro_banco (FECHA_APUNTE, FECHA_AMORTIZACION, DETALLE, SUBCONCEPTO, CONCEPTO, SUBIMPORTE, IMPORTE_ING, ID_Registro) VALUES ('$fecha_apunt', '$fecha_amort', '$detalle', '$subconcepto', '$concepto', $subimporte, $importe_ing, '$id_registro')";  // los que estan con comillas simples es porque son tipo texto

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