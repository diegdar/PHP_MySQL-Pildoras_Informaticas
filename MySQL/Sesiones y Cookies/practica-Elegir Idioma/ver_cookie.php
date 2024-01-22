<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    //Si NO se ha creado la cookie con el nombre 'idioma_seleccionado'
    if(!$_COOKIE["idioma_seleccionado"]){ 

        header("location:elegir_idioma.php"); //dirige al usuario a la pagina para seleccionar el idioma

    }else if($_COOKIE["idioma_seleccionado"]=="es"){
        
        header("location:spanish.php"); //dirigirá al usuario a la página en español
    }else if($_COOKIE["idioma_seleccionado"]=="en"){
        
        header("location:english.php"); //dirigirá al usuario a la página en ingles
    }
?>
</body>
</html>