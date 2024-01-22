<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="calculadora.php" name="form1" method="post">
    <p>
        <label for="num1"></label>
        <input type="text" name="num1" id="num1">
        <label for="num2"></label>
        <input type="text" name="num2" id="num2">
        <label for="operacion"></label>
        <select name="operacion" id="operacion">
            <option>Suma</option>
            <option>Resta</option>
            <option>Multiplicación</option>
            <option>División</option>
            <option>Módulo</option>
            <option>Incremento</option>
            <option>Decremento</option>
        </select>
    </p>
    <p>
        <input type="submit" name="button" id="button" value="Enviar" onclick="prueba">
    </p>   
</form>
<p>&nbsp;</p>

<?php

    include ("calculadora.php");

        //isset hace que se envie el formulario solo cuando el usuario le ha dado al boton 'Enviar'
        if(isset($_POST["button"])){ // $_POST es una variable superglobal que captura el click de la etiqueta con id="button" y nos dara un array

            //captura el valor que el usuario halla introducido en la etiqueta con id="num1" y se guarda en la variable '$num1'
            $numero1 = $_POST["num1"]; 
            $numero2 = $_POST["num2"];
            $operacion = $_POST["operacion"];
    
            calcular($operacion);
    
        }
                
?>

</body>
</html>