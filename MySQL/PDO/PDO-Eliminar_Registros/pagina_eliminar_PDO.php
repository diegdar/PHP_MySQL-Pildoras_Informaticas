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

$id_registro = $_GET["id_registro"];

// Instruccion para que intente hacer el codigo que se encuentra dentro, si encontrara algun erro pasaria al 'catch'
    try{

        // INTANCIACION DE LA CLASE PDO
        $base = new PDO("mysql:host=localhost; dbname=prueba", "root", ""); // servidor; BBDD, usuario, contraseña

        // Especificacion caracteres latinos utf8
        $base->exec("SET CHARACTER SET utf8");

        $sql = "DELETE FROM registro_banco WHERE ID_Registro = :id";

        // Creacion del objeto PDOStatement
        $resultado = $base->prepare($sql);
        // asociacion de los nombres de los marcadores con las variables en el array
        $resultado->execute(array(":id"=>$id_registro)); 

        echo "Registros insertados";

        // Cierra el curso (es el que recorre cada fila de la tabla) para liberar recursos
        $resultado->closeCursor();

    // En caso de que no se pueda hacer la conexion por un error de excepcion
    }catch(Exception $error){ // se ejecuta si hay un error
        
        // Mata el error por defecto y nos muestra uno personalizado con el codigo final del error
        // die("Error: " . $error->GetMessage()) . "<br>";
        // die("codigo del error: " . $error->getCode()) ;
        die("ERROR, Linea del error: " . $error->getLine()) ;

    // Libera recursos que hemos ido consumiendo
    }finally{ //finally se ejecutaria siempre, haya un error o no

        // vacia la memoria
        $base = null;

    }

?>
</body>
</html>