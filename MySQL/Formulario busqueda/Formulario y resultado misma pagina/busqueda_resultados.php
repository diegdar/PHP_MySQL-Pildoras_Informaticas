<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<?php

function ejecuta_consulta($labusqueda, $fechaInicio, $fechaFin){

    require("..\..\datos_conexion.php");

    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

    // Permite trabajar con caracteres latinos
    mysqli_set_charset($conexion, "utf8");

    // CONSULTA SQL
    $consulta = "SELECT * FROM REGISTRO_BANCO WHERE DETALLE LIKE '%$labusqueda%' AND FECHA_APUNTE >= '$fechaInicio' AND FECHA_APUNTE <= '$fechaFin'";
    //Al agregar  %  antes y después de la variable  $busqueda  en la consulta, estás indicando que deseas buscar cualquier registro que contenga la palabra introducida por el usuario en cualquier posición dentro del campo "DETALLE" 

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

}

?>

</head>
<body>
    
<?php
    $mibusqueda = $_GET["buscar"]; //La funcion $_GET recoje lo que el usuario ha introducido en el cuadro de texto con el name="buscar" del formulario
    $fechaInicio = $_GET["fechaInicio"]; // Fecha de inicio ingresada por el usuario
    $fechaFin = $_GET["fechaFin"]; // Fecha de fin ingresada por el usuario

    $mipagina = $_SERVER["PHP_SELF"]; //$_SERVER indica la pagina del servidor que debe llamar y PHP_SELF indica que es ella misma

    if($mibusqueda!=null){ //llamara a la funcion si hay datos que buscar y sera despues de enviarse el formulario
        ejecuta_consulta($mibusqueda, $fechaInicio, $fechaFin);
    }else{ //Aqui entrara la 1ra vez que se cargue la pagina porque no habrá datos que buscar por lo que costruira el formulario y luego de dar a enviar formulario con la palabra buscada entrara en el 1er condicional para llamar a la funcion 'ejecuta_consulta()'
        echo (
            "<form action='" . $mipagina . "' method='get'>
            <label>Buscar en Detalle: <input type='text' name='buscar'></label>

            <label for='fechaInicio'>Fecha Inicio: <input type='date' name='fechaInicio'></label>
            <label for='fechaFin'>Fecha Inicio: <input type='date' name='fechaFin'></label>
        
            <input type='submit' name='enviando' value='Dale!'>

            </form>");
    }

    // ⚠️⚠️Si probamos la pagina en local nos saldran warnings de que no esta definido "bucar" , "fechaInicio" y "fechaFin" pero igualmente funcionara el formulario. Luego en remoto estos errores desaparecen. 
?>
</body>
</html>