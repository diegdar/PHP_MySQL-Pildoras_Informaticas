<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
th,  td{
    border: 2px solid black;
}
td{
    text-align: center;
}
input{
    text-align: center;
    border: 0px;
}
th{
    color: red;
    background-color: #a6a6a6;
    font-size: 16px;
    position: sticky;
    top: 0;
    z-index: 5;
}

table{
    width: 80%;
    /* alinea verticalmente la tabla */
    margin: auto;
}
.btn_actualizar{
    font-size: 15px;
    background-color: #181818;
    color: white;
    padding: 7px;
    font-weight: bold;
}
</style>
    <title>Document</title>
</head>
<body>

<?php

require("..\datos_conexion.php");

// MODO DE CONEXIÓN MYSQLI-Procedimental
$conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

// la funcion 'mysqli_real_escape_string' impide que se introduzcan datos diferentes a letras o numeros
$usuario = mysqli_real_escape_string($conexion, $_GET["usu"]); 
$password = mysqli_real_escape_string($conexion, $_GET["contra"]); 

// Permite trabajar con caracteres latinos
mysqli_set_charset($conexion, "utf8");

// CONSULTA SQL
$consulta = "DELETE FROM datos_usuarios WHERE USUARIO ='$usuario' AND CONTRA='$password' ";
 //Al agregar  %  antes y después de la variable  $usuario  en la consulta, estás indicando que deseas buscar cualquier registro que contenga la palabra introducida por el usuario en cualquier posición dentro del campo "DETALLE" 

// EJECUCIÓN DE LA CONSULTA
$resultados = mysqli_query($conexion, $consulta);

if($resultados == false){ //comprueba que no haya errores
    echo "Error en la consulta";
}else{
    // La funcion mysqli_affected_rows identifica si hubo filas afectadas y si asi es igual a 0 es porque no ha eleminado registros
    if(mysqli_affected_rows($conexion) == 0){ 
        echo "El usuario o contraseña no existen para ser eliminados";
    }else{
        echo "Se ha realizado la baja del usuario $usuario";
    }
}
mysqli_close($conexion);

?>
    
</body>
</html>