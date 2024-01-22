<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
    global $nombre;

    $nombre = "juan";

    function dameNombre(){

        $nombre = "El nombre es $nombre";
    }

    dameNombre();

    echo $nombre;


?>
</body>
</html>