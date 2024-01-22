<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // CONEXION MSQLI PROCIDEMENTAL
    $miConexion = mysqli_connect("localhost", "root", "", "bbddblog");

    // Comprobación conexión
    if(!$miConexion){
        echo "La conexión ha fallado: " . mysqli_error(); //muestra mensaje de error
        
        exit();//si hay error impide que siga leyendo el resto de lineas
    }

    if($_FILES['imagen']['error']){ //Cuando hay error de subida
        switch($_FILES['imagen']['error']){
            case 1: //Error exceso de tamaño de archivo en php.ini
                echo "El tamaño del archivo excede lo permitido por el servidor";
                break;
            case 2: //El archivo subido por el usuario excede el tamaño marcado en el formulario HTML.
                echo "El tamaño del archivo excede 2 MB";
                break;
            case 3: //El fichero fue sólo parcialmente subido
                echo "El envió de archivo se interrumpió y se subió solo parte del archivo";
                break;
            case 4: //No hay fichero
                echo "No se ha enviado ningún archivo";
                break;
        }
    }else{
        echo "Ha subido el archivo correctamente <br>";

        // Si no hay ningun error
        if((isset($_FILES['imagen']['name']) && ($_FILES['imagen']['error'] == UPLOAD_ERR_OK))){
            $destino_Ruta = "img/"; //carpeta imagenes

            move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_Ruta . $_FILES['imagen']['name']); //mueve de carpeta temporal a ruta definitiva

            echo "El archivo " . $_FILES['imagen']['name'] . " Se ha copiado correctamente en la carpeta de imágenes ";

        }else{
            echo "El archivo no se ha podido copiar a la carpeta de imágenes";
        }
    }
    $elTitulo = $_POST["campo_titulo"];
    $laFecha = date("Y-m-d H:i:s"); //fecha publicacion comentario
    $elComentario = $_POST["area_comentarios"];
    $laImagen = $_FILES["imagen"]['name'];

    //Consulta que inserta los valores del formulario en la BBDD
    $miconsulta = "INSERT INTO CONTENIDO (Titulo,	Fecha,	Comentario,	Imagen) VALUES ('" . $elTitulo . "', '" . $laFecha . "', '" . $elComentario . "', '" . $laImagen . "' )";

    // Ejecución de la consulta SQL
    $resultado = mysqli_query($miConexion, $miconsulta);

    // Cerramos la conexion
    mysqli_close($miConexion);


    echo "<br> Se ha agregado el comentario con éxito. <br><br>";
    ?>

    <a href="Formulario.html">Añadir nueva entrada</a>
    <br><br>
    <a href="mostrar_Blog.php">Ver Blog</a>

</body>
</html>