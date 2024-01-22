<?php
    try{
        // Conexion a la base de datos
        $base = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');
        // creacion objetos de error si hubiera alguno
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // codigo utf9
        $base->exec("SET CHARACTER SET UTF8");

    }catch(exception $e){

        die('Error: ' . $e->getMessage());
        echo "Línea del error: " . $e->getLine();
    }

?>