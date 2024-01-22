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
        $usuario = htmlentities(addslashes($_POST["usuario"]));
        $password = htmlentities(addslashes($_POST["password"]));

        // cuenta el numero de veces que se encuentra el nombre de usuario en la BBDD
        $coincidePassword = false;

        // conexion BBDD
        $base = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOMBRE . ';charset=' . DB_CHARSET, DB_USUARIO, DB_CONTRA);

        // Si hay un error crea un objeto de este para poder utilizar sus metodos en la parte del 'catch'
        $base->setAttribute  (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Instruccion SQL
        $sql = "SELECT * FROM usuarios_pass WHERE USUARIO = :user" ;

        // Prepara la consulta
        $resultado = $base->prepare($sql);

        // Ejecuta la instruccion SQL, asocia el marcador a la variable $usuario y guarda todos los valores con el nombre del usuario introducido en un array
        $resultado->execute(array(":user"=>$usuario));

        // recorre el recordset que nos devuelve la consulta de la variable $registro
        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

            // Verifica si la contraseña introducida por el usuario coincide con el hash
            if(password_verify($password, $registro['PASSWORD'])){
                $coincidePassword = true; //Cambiará su valor a true si la contraseña introducida por el usuario es igual a la de la BBDD
            }
        }
        if($coincidePassword == true){
            echo "Las contraseñas coinciden y puedes entrar";
        }else{
            echo "Las contraseñas NO coinciden. Acceso denegado!";
        }
        $resultado->closeCursor();

    }catch(Exception $e){

        die("ERROR: " . $e->getMessage());
    }

?>
</body>
</html>