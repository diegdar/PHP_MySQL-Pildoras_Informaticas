<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    include ("vehiculos.php");

    $mazda = new Coche();

    $pegaso = new Camion();


    echo "El mazda tiene " . $mazda->getRuedas() . " ruedas <br>";

    echo "El Pegaso tiene " . $pegaso-> getRuedas() . " ruedas <br>";

    echo "El mazda tiene un motor de " . $mazda->getMotor() . "cc <br>";
   
    
?>
</body>
</html>