<?php
    function incrementaVariable(){

        static $contador = 0; //static hace que se ejecute esta linea una sola vez y ademas se conserve el valor de la variable $contador cada vez que se llama la función

        $contador ++;

        echo $contador . "<br>";
    }

    incrementaVariable();
    incrementaVariable();
    incrementaVariable();
?>