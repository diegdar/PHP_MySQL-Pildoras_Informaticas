<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    // Reanuda la sesion que esta abierta, para que identifique que sesion tiene que cerrar
    session_start();

    // cierra la sesion abierta
    session_destroy();

    // redirige a la pagina del login
    header("location:login.html");

?>
</body>
</html>