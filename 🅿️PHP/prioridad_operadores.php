<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    $var1 = true;
    $var2 = false;

    /* aqui estamos condicionando la forma en que se almacenara los valores en la variable $resultado:
        1. si $var1 y $var2 son true entonces se almacenara el este valor en $resultado.
        2.Si alguna de las variables es false el valor almacenado de $resultado sera false.
        3. Si el valor de las 2 variables es false el valor almacenado en $resultado es false.     
    ⚠️⚠️Esto es asi porque el && tiene prioridad sobre el '=' por lo que primero evalua '$var1 && $var2' y luego '$resultado ='*/
    $resultado = $var1 && $var2;  // $resultado = true;
    /*En cambio aqui el '=' tiene prioridad sobre 'and' por lo que primero se hace ejecuta la parte de '$resultado = $var1(true)' y luego la parte 'and $var2(false)' por lo que $resultado primero tomara el valor de true pero luego terminara valiendo false  */
    $resultado = $var1 and $var2;  //$resultado = false

    if($resultado == true){
        echo "Correcto";
    }else{
        echo "Incorrecto";
    }
?>
</body>
</html>