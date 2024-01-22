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

    $detalle = $_POST["detalle"];
    $concepto = $_POST["concepto"];
    // Instruccion para que intente hacer el codigo que se encuentra dentro
    try{

        // INTANCIACION DE LA CLASE PDO
        $base = new PDO("mysql:host=localhost; dbname=prueba", "root", ""); // servidor; BBDD, usuario, contraseña

        // Especificacion caracteres latinos utf8
        $base->exec("SET CHARACTER SET utf8");

        $sql = "SELECT FECHA_APUNTE, DETALLE, CONCEPTO, SUBIMPORTE, detalle 
        FROM registro_banco
        WHERE (CONCEPTO = :concept OR :concept = '')  AND (detalle LIKE CONCAT('%', :detalle, '%') OR :detalle = '')";// ':concepto' y ':id' -> son marcadores para utilizar en el array asociativo

        // Creacion del objeto PDOStatement
        $resultado = $base->prepare($sql);
        $resultado->execute(array(":concept"=>$concepto, ":detalle"=>$detalle)); // ":concepto"=>$concepto y ":id"=>$detalle -> buscan los marcadores 'concept' y 'id' y luego le dice que esas posiciones las asocie a las variables  '$concepto' y '$detalle' en el array asociativo.

        echo "<table>";
        echo "<tr><th>FECHA_APUNTE</th><th>DETALLE</th><th>CONCEPTO</th><th>SUBIMPORTE</th><th>detalle</th></tr>";

        $registros_encontrados= false;
        // en la variable $registro se guarda un array asociativo con las filas siempre que haya datos
        while($registro = $resultado->fetch (PDO::FETCH_ASSOC)){ //PDO::FETCH_ASSOC -> Asocia dentro del array $registro los campos con los nombres de la sentencia SQL
            $registros_encontrados = true;
            echo "<tr><td>" . $registro['FECHA_APUNTE'] . "</td><td>" . $registro['DETALLE'] . "</td><td>" . $registro['CONCEPTO'] . "</td><td>" . $registro['SUBIMPORTE'] . "</td><td>" . $registro['detalle'] . "</td></tr>";
        }
        // Mostrar aviso si no se encontraron registros
        if (!$registros_encontrados) {
            echo "<h1>No se han encontrado registros con el criterio '$concepto' . '$detalle'.</h1>";
        }
        
        // Cierra el curso (es el que recorre cada fila de la tabla) para liberar recursos
        $resultado->closeCursor();

        echo "</table>";


    // En caso de que no se pueda hacer la conexion por un error de excepcion
    }catch(Exception $error){ // se ejecuta si hay un error
        
        // Mata el error por defecto y nos muestra uno personalizado con el codigo final del error
        // die("Error: " . $error->GetMessage()) . "<br>";
        // die("codigo del error: " . $error->getCode()) ;
        die("Linea del error: " . $error->getLine()) ;

    // Libera recursos que hemos ido consumiendo
    }finally{ //finally se ejecutaria siempre, haya un error o no

        // vacia la memoria
        $base = null;

    }

?>
</body>
</html>