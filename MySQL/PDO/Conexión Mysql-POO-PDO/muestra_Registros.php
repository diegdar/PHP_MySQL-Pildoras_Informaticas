<?php
    // Importa la clase
    require "devuelve_Registros.php";

    $concepto = $_GET["buscar"];

    // Instanciamos al constructor de la clase para que ejecute la conexion y poder utilizar sus metodos 
    $registros = new DevuelveRegistros();

    // guarda los registros obtenidos del metodo de la clase en esta variable array
    $array_registros = $registros->get_registros($concepto);

?>

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

    echo "<table>";
    echo "<tr>";
    // Imprime el nombre de los campos(encabezados) dentro de etiquetas <th>, el valor es 0 dentro del array porque la primera posicion corresponde a los nombre de los campos

    $longArray = count($array_registros);
    if($longArray==0){
        echo "No se encuentran registros con el criterio introducido";
    }else{
        foreach ($array_registros[0] as $campo => $valor) {
            echo "<th>$campo</th>";
        }
        echo "</tr>";
        
        // Imprimir los registros dentro de etiquetas <td>
        foreach ($array_registros as $registro) {
            echo "<tr>";
            foreach ($registro as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";        
}

?>
</body>
</html>