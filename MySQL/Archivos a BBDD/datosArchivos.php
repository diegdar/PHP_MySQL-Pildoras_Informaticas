<?php
    // recibimos los datos del archivo
    $nombre_archivo = $_FILES["archivo"]['name'];
    $tipo_archivo = $_FILES["archivo"]['type'];
    $tamagno_archivo = $_FILES["archivo"]['size'];
    
    if($tamagno_archivo<=1000000){// Limita el tamaño del archivo a 1Mb
        // Especificamos la ruta de destino
        $carpeta_destino = 'C:\xampp\htdocs\uploads\\';
        // Movemos el archivo de la carpeta temporal a la carpeta definitiva de destino
        move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino.$nombre_archivo);
    }else{
        echo "El archivo excede el tamaño de 1Mb";
    }
    
    require("datos_conexion.php");
    
    // MODO DE CONEXIÓN MYSQLI-Procedimental
    $conexion = mysqli_connect($db_host, $db_usuario, $db_password, $db_nombre);
    
    if(mysqli_connect_errno()){
        echo "Fallo al conectar con la BBDD";
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die("No se encuentra la BBDD");
    
    // Designa el juego de caracteres utf8
    mysqli_set_charset($conexion, "utf8");
    
    // Abre un fichero o una URL
    $archivo_objetivo = fopen($carpeta_destino . $nombre_archivo, "r");
    
    // Lectura de un fichero en modo binario seguro para BLOB
    $contenido = fread($archivo_objetivo, $tamagno_archivo);

    // Escapa los caracteres especiales para que php no de problemas al leer la ruta del archivo
    $contenido = addslashes($contenido);
    
    // Cierra el flujo de datos abierto con 'fopen' para liberar recursos
    fclose($archivo_objetivo);
    
    // CONSULTA SQL: agrega un registro con la ruta del archivo   
    $sql = "INSERT INTO ARCHIVOS (Id, Nombre, Tipo, Contenido) VALUES (0, '$nombre_archivo', '$tipo_archivo', '$contenido')";
    
    // EJECUCIÓN DE LA CONSULTA
    $resultados = mysqli_query($conexion, $sql);
    
    if(mysqli_affected_rows($conexion)>0){
        echo "Se ha insertado el registro con éxito";
    }else{
        echo "No se ha podido insertar el registro";
    }
?>