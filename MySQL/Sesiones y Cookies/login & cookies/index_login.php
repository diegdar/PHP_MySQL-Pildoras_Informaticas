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
        table{
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
        td{
            text-align: center;
            padding: 10px 2px;
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
        .zona_registrados{
            background-color: #40d0a8;
        }
    </style>
</head>
<body>
<?php
$autenticado = false; //El usuario fue validado?

if(isset($_POST["enviar"])){ //Solo ejecutara el codigo de validacion si el usuario le ha dado al boton enviar del formulario_login

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

            $autenticado = true; // cambiamos el valor de la variable a true por que fue autenticado el usuario

            // si el usuario activo la casilla de recordar usuario
            if(isset($_POST["recordar_usuario"])){
                // Elegimos un periodo de vida de la cookie de 1 año
                $vida_cookie = time() + (1 * 365 * 24 * 60 * 60);
                // crea la cookie del nombre de usuario
                setcookie("nombre_usuario", $_POST["usuario"], $vida_cookie);

            }

        }else{ // si el usuario o contraseña no son validos
            echo "<h2 class='error_login'>⚠️Usuario y/o contraseña incorrecto!</h2>";
        }

    }catch(Exception $e){

        die("ERROR: " . $e->getMessage());
    }
}
?>

<?php
// Si no se ha logeado aun el usuario
    if($autenticado == false){
        // Si no se ha creado la cookie del nombre del usuario
        if(!isset($_COOKIE["nombre_usuario"])){
            include("formulario_login.html"); // mostrará el formulario_login de login
        }
    }

    // si se creo la cookie con el nombre del usuario
    if(isset($_COOKIE["nombre_usuario"])){
        // saludamos al usuario
        echo "<p class='validated_user'>¡Hola " . $_COOKIE["nombre_usuario"] . "!</p> </p> <a href='cierre_sesion.php'>Cerrar sesion</a>";

    // Si el usuario se valido pero no se creo la cookie (por cualquier razon)
    }else if($autenticado == true){
        // saludamos al usuario
        echo "<p class=validated_user>¡Hola " . $_POST["usuario"] . "!</p>";

    }
?>

<br>
<h1>CONTENIDO DE LA WEB</h1>
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

<?php
    //comprueba si en esta sesion el login tuvo exito o si hay una cookie creada de otra sesion
    if($autenticado == true || isset($_COOKIE["nombre_usuario"])){ 

        include("zona_registrados.html"); // archivo solo visto para los usuarios validados
    }
?>

</body>
</html>