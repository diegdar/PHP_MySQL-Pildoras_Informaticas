<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    function cambia_mayus(&$param){
        $param = strtolower($param);

        $param = ucwords ($param);

        return $param;
    }

    $cadena = "hOlA mUnDo";

    echo cambia_mayus($cadena) . "<br>";

    echo $cadena;
?>

</body>
</html>