<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
th,  td{
    border: 2px solid black;
}
td{
    text-align: center;
}
input{
    text-align: center;
    border: 0px;
}
th{
    color: red;
    background-color: #a6a6a6;
    font-size: 16px;
    position: sticky;
    top: 0;
    z-index: 5;
}
table{
    width: 80%;
    /* alinea verticalmente la tabla */
    margin: auto;
}
.btn_actualizar{
    font-size: 15px;
    background-color: #181818;
    color: white;
    padding: 7px;
    font-weight: bold;
}
</style>
    <title>Document</title>
</head>
<body>
<?php
$concepto = $_GET["buscar"]; 
require("..\datos_conexion.php");
// MODO DE CONEXIÓN MYSQLI-Procedimental
$conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);
// Permite trabajar con caracteres latinos
mysqli_set_charset($conexion, "utf8");
// CONSULTAS PREPARADAS
    // 1. Creamos la sentencia SQL sustituyendo los valores de criterio por el símbolo 
    $sql = "SELECT 	FECHA_AMORTIZACION, DETALLE, CONCEPTO, SUBIMPORTE, ID_Registro FROM registro_banco WHERE CONCEPTO = ?";
    // 2. Preparamos la consulta 
    $resultado = mysqli_prepare($conexion, $sql);
    // 3. Unir los parametros a la sentencia SQL 
    $ok = mysqli_stmt_bind_param($resultado, "s", $concepto); // // "s" indica que la variable  es un string, la "i" tipo numero y si hubiera sido un decimal se pondria "d" 
    // 4. Ejecutar la consulta con la función 
    $ok = mysqli_stmt_execute($resultado);
    if($ok == false){
        echo "Error al ejecutar la consulta";
    }else{
        // 5. Asociar variables al resultado de la consulta
        $ok = mysqli_stmt_bind_result($resultado, $f_amort, $detalle, $concepto, $subimporte, $id_regis);
        // Imprimir la tabla con encabezados
        echo "<table>";
        echo "<tr><th>FECHA_AMORTIZACION</th><th>DETALLE</th><th>CONCEPTO</th><th>SUBIMPORTE</th><th>ID_Registro</th></tr>";
        // 6. Leer los resultados 
        $registros_encontrados = false;
        while (mysqli_stmt_fetch($resultado)){
            $registros_encontrados = true;
            echo "<tr><td>$f_amort</td><td>$detalle</td><td>$concepto</td><td>$subimporte</td><td>$id_regis</td></tr>";
        }
        echo "</table>";

        // Mostrar aviso si no se encontraron registros
        if (!$registros_encontrados) {
            echo "<h1>No se han encontrado registros con el criterio '$concepto'.</h1>";
        }
        // Cerramos el objeto que nos dio la función mysqli_prepare
        mysqli_stmt_close($resultado);
    }
mysqli_close($conexion);
?>
</body>
</html>