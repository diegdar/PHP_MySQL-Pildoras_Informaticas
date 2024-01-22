<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    setcookie("idioma_seleccionado", $_GET["idioma"], time() + 2592000 );

    header("location:ver_cookie.php");

?>
</body>
</html>