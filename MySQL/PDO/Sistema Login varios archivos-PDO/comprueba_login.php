<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

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

            // Sera redirigido a la zona(paginas) de usuarios registrados
            header("location:usuarios_registrados1.php");

        }else{ // si el usuario o contraseña no son validos

            // Sera redirigido a la pagina de login de nuevo
            header("location:login.html");
        }

    }catch(Exception $e){

        die("ERROR: " . $e->getMessage());
    }

?>
</body>
</html>