<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .contenedor{
        text-align: center;
    }
    hr{
        border: 2px dotted red;
    }
</style>
<body>
    
<?php
    // CONEXION MSQLI PROCIDEMENTAL
    $miConexion = mysqli_connect("localhost", "root", "", "bbddblog");

    // Comprobación conexión
    if(!$miConexion){
        echo "La conexión ha fallado: " . mysqli_error(); //muestra mensaje de error
        
        exit();//si hay error impide que siga leyendo el resto de lineas
    }

    // Consulta SQL que ordena la fecha de entradas del Blog de mas recientes a mas antigüas
    $miConsulta = "SELECT * FROM CONTENIDO ORDER BY FECHA DESC ";

    // si la consulta SQL ejecuta correctamente en la conexión a la base de datos. El resultado de la consulta se almacena en la variable  $resultado como array
    if($resultado = mysqli_query($miConexion, $miConsulta)){
        // Se hace un recorrido del array de forma asociativo
        while($registro = mysqli_fetch_assoc($resultado)){
            echo "<div class='contenedor'>";
            echo "<h3>" . $registro['Titulo'] . "</h3>";
            echo "<h4>" . $registro['Fecha'] . "</h4>";
            echo "<section class='comentarios'>" . $registro['Comentario'] . "</section><br><br>";

            echo "<section width='400px'>" . $registro['Comentario'] . "</section>";

            // Si no se almacenó una imagen porque el usuario no quiso evita que salga un icono de imagen rota
            if($registro['Imagen'] !=""){
                echo "<img src='img/" . $registro['Imagen'] . "' width='300px' >";
            }

            echo "<br><hr><br></div>"; 
        }
    }
?>
</body>
</html>