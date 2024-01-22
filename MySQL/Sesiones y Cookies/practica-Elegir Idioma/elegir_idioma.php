<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 20%;
            border: 0;
            align: center;
            margin: auto;
        }
        td{
            align: center;
            height: 60px; 
            padding: 10px
        }
        th{
            font-size: 2em;
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php
//Si se ha creado la cookie con el nombre 'idioma_seleccionado' (esto es si el usuario habia elegido un idioma antes de esta sesion)    
if(isset($_COOKIE["idioma_seleccionado"])) { 
    //si el usuario habia elegido en la ultima vez que navego en ingles        
        if($_COOKIE["idioma_seleccionado"]=="es"){ 
            header("location:spanish.php");
        //si el usuario habia elegido en la ultima vez que navego en español           
        }else if($_COOKIE["idioma_seleccionado"]=="en"){         
            header("location:english.php");
        }
    }
    ?>

    <table>
        <tr>
            <th colspan="2">Elige idioma</th>
        </tr>
        <tr>
            <td><a href="crea_cookie.php?idioma=es"><img src="img/bandera_espana.png" alt="bandera españa"></a></td>
            <td><a href="crea_cookie.php?idioma=en"><img src="img/bandera_inglaterra.png" alt="bandera inglaterra"></a></td>
        </tr>
    </table>
</body>
</html>