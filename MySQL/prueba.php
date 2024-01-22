<?php

$persona = [
    "nombre"=>"Juan",
    "edad"=>"18",
    "ciudad"=>"Madrid"

];

["nombre"=>$elNombre, "edad"=>$laEdad, "ciudad"=>$laCiudad] = $persona;

echo "Nombre: " . $elNombre . "<br>"; //Imprime Juan
echo "Edad: " . $laEdad . "<br>"; //Imprime 18
echo "Ciudad: " . $laCiudad . "<br>"; //Imprime Madrid


?>