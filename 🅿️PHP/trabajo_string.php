<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

    <style>
        .resaltar{
            color:red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    

<?php

$variable1 = "casa";

$variable2 = "CASA";

$resultado = strcmp($variable1, $variable2); //devuelve 1(true) porque NO son iguales, ya que distingue las mayusc. y minusc.

if($resultado){ //si el valor es 1(true) es porque NO coinciden y se cumpliria esta condicion
    echo "No coinciden";
}else{ // si el valor es 0(false) es porque coinciden y se cumpliria esta condicion
    echo "Coinciden";
}
?>

</body>
</html>