<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// ARRAY INDEXADO (no hace falta indicar la posicion para agreagar un valor, se agregara a continuacion del ultimo)
    //1ra forma indexado:
    $semana [] = "Lunes";
    $semana [] = "Martes";
    $semana [] = "Miercoles";

    echo $semana[1]; //Martes

    echo "<br>";

    $semana [3] = "Jueves";
    
    echo $semana[2]; // Miercoles

    echo "<br>";

    //Como ordenar los elementos

    sort($semana);

    for ($i=0; $i <count($semana) ; $i++) { 
        
        echo $semana[$i] . "<br>";
    }

    $numeros = array(8, 2, 0, 4, 6);

    sort($numeros);

    for ($i=0; $i <count($numeros) ; $i++) { 
        echo $numeros[$i] . "<br>";
    }

//     //2da forma indexado:
//     $datosVarios = array(54,23,"Luis", "Manzana", 4);

//     foreach($datosVarios as $i=>$val) { // $i seria la posición y $val el valor del elemento
        
//         echo $datosVarios[$i] . "<br>";
//     }
//     for ($i=0; $i <count($datosVarios) ; $i++) { //la funcion count nos daria la longitud del array
        
//         echo $datosVarios[$i] . "<br>";

//     }

// //ARRAY ASOCIATIVO (la parte de la izquierda de la flecha es el nombre asociado a la posición)
//     $datos = array("Nombre"=>"Juan", "Apellido"=>"Gómez", "Edad"=>21);

//     $datos["País"] = "España";

//     foreach($datos as $clave => $valor){ //Las variables: $clave seria el nombre asociado a la posicion, $valor el valor del elemento(el nombre de esta variables pueden ser cualquiera)

//         echo "A $clave le corresponde $valor <br>";
//     }

    
    // ⚠️⚠️Hay que tener cuidado en NO volver a utilizar el mismo nombre que le dimos a un array pues nos daria problema y machacar el array!!
        // $datos = "Martin";

    // echo $datos["Apellido"]; //Gómez

    // if(is_array($datos)){
    //     echo "Es un array";
    // }else{
    //     echo "No es un array";
    // }
?>
</body>
</html>