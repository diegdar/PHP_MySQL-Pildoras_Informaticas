<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

  function frase_mayus($frase, $conversion=true){ //$conversion es un parametro por defecto

    $frase = strtolower($frase);

    if($conversion == true){
        $resultado = ucwords($frase);
    }else{
        $resultado = strtoupper($frase);
    }

    return $resultado;

  }
    //  como solo le hemos pasado un argumento a la funcion el segundo parametro sera el que designamos por defecto(true) al construir la función y en la funcion el condicional que ejecutara sera el primero poniendo en mayusculas la primera letra de cada palabra 
  echo (frase_mayus("esto es una prueba")); // Esto es una prueba
  // si ponemos un segundo argumento cambiamos el valor por defecto y en la funcion cambiara los condicionales y pondra toda la frase en mayusculas
  echo (frase_mayus("esto es una prueba", false)); //Esto Es Una Prueba

?>
</body>
</html>