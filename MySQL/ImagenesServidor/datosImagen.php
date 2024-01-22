<?php
    // recibimos los datos de la imagen
    $nombre_imagen = $_FILES["imagen"]['name'];
    $tipo_imagen = $_FILES["imagen"]['type'];
    $tamagno_imagen = $_FILES["imagen"]['size'];

    // imprime en pantalla el typo de archivo subido
    // echo $tipo_imagen;

    if($tamagno_imagen<=1000000){// Limita el tamaño de la imagen a 1Mb
        if($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif"){ //limita el tipo de archivo
            // Especificamos la ruta de destino
            $carpeta_destino = 'C:\xampp\htdocs\uploads\\';
            // Movemos la imagen de la carpeta temporal a la carpeta definitiva de destino
            move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino.$nombre_imagen);
        }else{

            echo "Solo se pueden subir imagenes de tipo png, jpg o gif";
        }
    }else{

        echo "La imagen excede el tamaño de 1Mb";
    }

    require("datos_conexion.php");

    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);

    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");

    // Designa codigo latino utf8
    mysqli_set_charset($conexion, "utf8");

    // CONSULTA SQL agregará la ruta de la imagen al registro especificado
        $sql = "UPDATE productos SET Foto = '$nombre_imagen' WHERE idProducto = '100884807' ";
    // CONSULTA SQL agregará un resgistro con la ruta de la imagen   
        // $sql = "INSERT INTO PRODUCTOS (FOTO) VALUES ('$nombre_imagen') ";

    // EJECUCIÓN DE LA CONSULTA
    $resultados = mysqli_query($conexion, $sql);

?>
 

