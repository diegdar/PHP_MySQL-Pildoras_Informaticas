<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_COOKIE["prueba"])){ //comprueba si la cookie existe

        echo $_COOKIE["prueba"]; //variable super global que crea un array asociativo con lo que recoge de la cookie con el nombre 'prueba'

    }else{
        echo "La cookie no se ha creado";
    }
    ?>
</body>
</html>