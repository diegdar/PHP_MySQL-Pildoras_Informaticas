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
$f_apunt = $_GET["f_apunt"]; 
$f_amort = $_GET["f_amort"]; 
$detalle = $_GET["detalle"]; 
$subconceto = $_GET["subconceto"]; 
$concepto = $_GET["concepto"]; 
$subImporte = $_GET["subImporte"]; 
$impor_ing = $_GET["impor_ing"]; 
$id_registro = $_GET["id_registro"]; 

require("..\datos_conexion.php");

// MODO DE CONEXIÓN MYSQLI-Procedimental
$conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);
// Permite trabajar con caracteres latinos
mysqli_set_charset($conexion, "utf8");

// CONSULTAS PREPARADAS
    // 1. Creamos la sentencia SQL sustituyendo los valores de criterio por el símbolo 
    $sql = "INSERT INTO	 registro_banco (FECHA_APUNTE, FECHA_AMORTIZACION, DETALLE, SUBCONCEPTO, CONCEPTO, SUBIMPORTE, IMPORTE_ING, ID_Registro) VALUES (?,?,?,?,?,?,?,?)"; // hay que poner tanto signos ? como campos hay en la consulta
    // 2. Preparamos la consulta 
    $resultado = mysqli_prepare($conexion, $sql);
    // 3. Unir los parametros a la sentencia SQL 
    $ok = mysqli_stmt_bind_param($resultado, "sssssiis", $f_apunt, $f_amort, $detalle, $subconceto, $concepto, $subImporte, $impor_ing, $id_registro); // "s" indica que la variable  es un string, la "i" tipo numero y si hubiera sido un decimal se pondria "d" 
    // 4. Ejecutar la consulta con la función 
    $ok = mysqli_stmt_execute($resultado);
    if($ok == false){
        echo "Error al ejecutar la consulta";
    }else{
        echo "Registro agregado!.";

        // Cerramos el objeto que nos dio la función mysqli_prepare
        mysqli_stmt_close($resultado);
    }
mysqli_close($conexion);
?>
</body>
</html>