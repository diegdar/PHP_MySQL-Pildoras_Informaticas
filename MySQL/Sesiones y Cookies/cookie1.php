<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    setcookie("prueba", "Esta es la información de nuestra primera cookie", time() + 300, "../zona_contenidos/leer_cookie2.php"); /*
    -El 1er parametro: Indica el nombre de la cookie.
    -El 2do parametro: Indica el contenido de la cookie.
    -El 3er parametro contiene la duración de la vida de la cookie: la funcion time() establece la hora, minutos y segundos en que se cargó la página. 300 es el periodo de vida de la cookie, por lo que la cookie duraría 5 minutos. 
    -El 4to parametro indica el directorio de actuacion de la cookie */

    echo "Cookie 1 creada"

?>

</body>
</html>