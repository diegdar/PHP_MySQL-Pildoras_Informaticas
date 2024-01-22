<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    setcookie("prueba", "Esta es la información de nuestra primera cookie", time() - 1, "../zona_contenidos/leer_cookie2.php"); // al establecer un tiempo negativo precedido de la funcion time() en el 3er parámetro hara que borre la cookie

?>
</body>
</html>