<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1, h2{
            text-align: center;
        }
        form table{
            width: 25%;
            background-color: #FFC;
            border: 2px dotted #F00;
            margin: auto;
        }
        .izq{
            text-align: right;
        }
        .der{
            text-align: left;
        }
        form td{
            text-align: center;
            padding: 10px;
        }
        .imagenes{
            width: 300px;
            height: 150px;
        }
        .contenedor_imagenes{
            display: flex;
            justify-content: center;
        }
        .error_login{
            color: red;
        }
        .validated_user{
            color: blue;
            font-size: 1.7em;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php

if(isset($_POST["enviar"])){ //Solo ejecutara el codigo de validacion si el usuario le ha dado al boton enviar del formulario

    require("config.php"); //importacion datos conexion

    try{
        $base = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOMBRE . ';charset=' . DB_CHARSET, DB_USUARIO, DB_CONTRA);

        // Si hay un error crea un objeto de este para poder utilizar sus metodos en la parte del 'catch'
        $base->setAttribute  (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Instruccion SQL
        $sql = "SELECT * FROM usuarios_pass WHERE usuario = :user AND password = :contra" ;

        // Prepara la consulta
        $resultado = $base->prepare($sql);

        // Almacenamiento de los valores introducidos por el usuario
            $usuario = htmlentities(addslashes($_POST["usuario"]));
            $password = htmlentities(addslashes($_POST["password"]));

        // bindValue Asocia los marcadores a las variables con los datos introducidos por el usuario
        $resultado->bindValue(":user", $usuario);
        $resultado->bindValue(":contra", $password);

        // Ejecuta la instruccion SQL
        $resultado->execute();

        // rowCount() nos da el numero de registros que coinciden con los valores introducidos
        $numero_registro = $resultado->rowCount();

        if($numero_registro !=0){ // Si el usuario y contraseña coinciden

            // Inicio de sesion del usuario validado
            session_start();

            // Almacena en una variable super global el nombre del usuario validado
            $_SESSION["user"]=$_POST["usuario"];

        }else{ // si el usuario o contraseña no son validos
            echo "<h2 class='error_login'>⚠️Usuario y/o contraseña incorrecto!</h2>";
        }

    }catch(Exception $e){

        die("ERROR: " . $e->getMessage());
    }
}
?>

<?php
//Mostrará el formulario si NO se ha iniciado sesion
if(!isset($_SESSION["user"])){ 
    include ("formulario.html"); //inserta el codigo del archivo formulario.html

// Si se ha validado el usuario mostrara el nombre del mismo y el enlace al archivo para cerrar sesión
}else{
    echo "<p class='validated_user'>Usuario: " . $_SESSION["user"] . "</p> <a href='cierre_sesion.php'>Cerrar sesion</a>
    ";
}
?>

<br>
<h1>Contenido Web</h1>
<div class="contenedor_imagenes">
    <table>
        <tr>
            <td><img src="img/cathedral-8318952_1280.jpg" alt="catedral" class="imagenes"></td>
            <td><img src="img/childrens-book-8304585_1280.jpg" alt="niños" class="imagenes"></td>
        </tr>
        <tr>
            <td><img src="img/compass-8324516_1280.webp" alt="compas" class="imagenes"></td>
            <td><img src="img/pastries-8324971_1280.webp" alt="galletas" class="imagenes"></td>
        </tr>
    </table>
</div>
</body>
</html>