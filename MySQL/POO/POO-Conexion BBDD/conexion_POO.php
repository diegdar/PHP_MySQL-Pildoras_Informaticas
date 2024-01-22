<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

</head>
<body>
<?php
    $conexion = new mysqli("localhost", "root", "", "prueba");

    if($conexion->connect_errno){
        echo "Fallo de la conexiòn " . $conexion->connect_errno; //nos dira el tipo de error que hubo

    }
    // indica que la codificacion es "utf8"
        // mysqli_set_charset($conexion, "utf8"); -> esta era la forma procedimental
        $conexion->set_charset("utf8"); //esta seria la forma con POO 

    // CONSULTA SQL
    $sql = "SELECT * FROM registro_banco";

    // EJECUCIÓN DE LA CONSULTA
        // $resultados = mysqli_query($conexion, $sql); -> esta era la forma procedimental 
        $resultados = $conexion -> query($sql); //esta seria la forma con POO 

    // Hace que cierre la conexion si hay un error
    if($conexion->errno){
        die($conexion->error);
    }

// MOSTRAR LOS REGISTROS 
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

    // while($fila = mysqli_fetch_array($resultados, MYSQL_ASSOC)){..} -> esta era la forma procedimental
    while ($fila = $resultados -> fetch_assoc()) { 
        echo "<tr>";
        // itera cada elemento($valor) del array $fila para imprimirlos dentro de la tabla
        foreach ($fila as $valor) {
            echo "<td>$valor</td>";
        }
        echo "</tr>";
    }
    
    echo "</table>";

// CIERRE DE CONEXION
    // mysqli_close($conexion); -> Forma procedimental
    $conexion -> close(); //Con POO
    
?>
</body>
</html>