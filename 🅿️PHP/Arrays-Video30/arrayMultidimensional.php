<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Array Multidimensional Asociativo
    $alimentos = array(  "fruta"=>array( "tropical"=>"kiwi",
                                        "citrico"=>"mandarina",
                                        "otros"=>"manzana"),

                        "leche"=>array( "animal"=>"vaca",
                                        "vegetal"=>"coco"), 

                        "carne"=>array( "vacuno"=>"lomo",
                                        "porcino"=>"pata") );

    echo $alimentos["carne"]["vacuno"]; //lomo

    echo "<br><br>";

// Con Bucles Foreach:
    foreach($alimentos as $claves_1raDimension => $claves_2daDimension){ //Muestra los elementos de la 1ra dimension
        echo "$claves_1raDimension: <br>";

        foreach ($claves_2daDimension as $clave => $valor) { // Muestra los elementos de la 2da dimension
            echo "$clave = $valor <br>";
        }
        echo "<br>";
    
    }

// Con la funcion var_dump:
    echo var_dump($alimentos);
?>
</body>
</html>