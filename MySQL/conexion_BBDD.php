<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conexion.css">

    <title>Document</title>
</head>
<body>
    <?php

    require("datos_conexion.php");
    
    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);
    
    // CONSULTA SQL
    $consulta = "SELECT * FROM REGISTRO_BANCO WHERE CONCEPTO='MERCADO'";
    
    // EJECUCIÓN DE LA CONSULTA
    $resultados = mysqli_query($conexion, $consulta);

// Obtener los nombres de las columnas
$columnas = array();
while ($nombreColumna = mysqli_fetch_field($resultados)) {
    $columnas[] = $nombreColumna->name;
}

// Mostrar los nombres de las columnas
echo "<table><tr>";
foreach ($columnas as $columna) {
    echo "<th>$columna</th>";
}
echo "</tr>";

// Mostrará los datos de los registros almacenados en la variable $fila como Array si hay datos(si mysqli_fetch_assoc==true )
while ($fila = mysqli_fetch_assoc($resultados)) {
    echo "<tr>";
    // itera cada elemento($valor) del array $fila para imprimirlos dentro de la tabla
    foreach ($fila as $valor) {
        echo "<td>$valor</td>";
    }
    echo "</tr>";
}

echo "</table>";

// Cierra la conexion para liberar los recursos del servidor y mejora el rendimiento general del sistema, ademas de evitar problemas de seguridad.
mysqli_close($conexion);
        
    ?>
</body>
</html>