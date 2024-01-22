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

    $usuario = $_GET["usu"]; //La funcion $_GET recoje lo que el usuario ha introducido en el cuadro de texto con el name="buscar" del formulario
    $password = $_GET["contra"]; //La funcion $_GET recoje lo que el usuario ha introducido en el cuadro de texto con el name="buscar" del formulario

require("..\datos_conexion.php");

// MODO DE CONEXIÓN MYSQLI-Procedimental
$conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

// Permite trabajar con caracteres latinos
mysqli_set_charset($conexion, "utf8");

// CONSULTA SQL
$consulta = "SELECT * FROM datos_usuarios WHERE USUARIO ='$usuario' AND CONTRA='$password' ";
 //Al agregar  %  antes y después de la variable  $usuario  en la consulta, estás indicando que deseas buscar cualquier registro que contenga la palabra introducida por el usuario en cualquier posición dentro del campo "DETALLE" 

echo "$consulta <br><br>";

// EJECUCIÓN DE LA CONSULTA
$resultados = mysqli_query($conexion, $consulta);
if($resultados == false){
    echo "Contraseña o usuario incorrecto!";
}else{
    // Obtener los nombres de las columnas
    $columnas = array();
    while ($nombreColumna = mysqli_fetch_field($resultados)) {
        $columnas[] = $nombreColumna->name;
    }
    // Mostrar los nombres de las columnas
    echo "<form action='actualizar.php' method='get'>";
    echo "<table><tr>";
    foreach ($columnas as $columna) {
        echo "<th>$columna</th>";
    }
    echo "</tr>";
    // Mostrará los datos de los registros almacenados en la variable $fila como Array si hay datos(si mysqli_fetch_assoc==true )
    while ($fila = mysqli_fetch_assoc($resultados)) {
        echo "<tr>";
        $i =0;
    // itera cada elemento($valor) del array $fila para imprimirlos dentro de la tabla
        foreach ($fila as $valor) {
            echo "<td class='concepto'>
            <input type='text' name='" . $columnas[$i] . "' value='" . $valor . "'></input>
            </td>";// $columnas es el array que se creo con el nombre de las columnas
            $i++;
            
        }
        echo "</tr>";
    }

    echo "</table>";

    // Cierra la conexion para liberar los recursos del servidor y mejora el rendimiento general del sistema, ademas de evitar problemas de seguridad.
}
mysqli_close($conexion);

?>
    
</body>
</html>