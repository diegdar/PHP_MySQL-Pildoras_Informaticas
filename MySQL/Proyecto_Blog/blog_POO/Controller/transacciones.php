<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Importación archivos 
    include_once("../Model/Objeto_Blog.php");
    include_once("../Model/Manejo_Objetos.php");

// Conexion a BBDD
    try{
        $miConexion = new PDO('mysql:host=localhost; dbname=bbddBlog', 'root', '');

        $miConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
                $destino_Ruta = "../img/"; //carpeta imagenes
    
                move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_Ruta . $_FILES['imagen']['name']); //mueve de carpeta temporal a ruta definitiva
    
                echo "El archivo " . $_FILES['imagen']['name'] . " Se ha copiado correctamente en la carpeta de imágenes ";
    
            }else{
                echo "El archivo no se ha podido copiar a la carpeta de imágenes";
            }
        }
        //creacion objeto: Manejo_Objetos para utilizar sus metodos
        $manejo_objetos = new Manejo_Objetos($miConexion); 
        
        //creacion Objeto_Blog para utilizar sus metodos
        $blog = new Objeto_Blog(); 

        $blog->setTitulo(htmlentities(addslashes($_POST["campo_titulo"]), ENT_QUOTES)); //pasa al setter el valor introducido por el usuario en el campo titulo y envita inyeccion SQL

        $blog->setFecha(Date("Y-m-d H:i:s")); //Pasa al setter la fecha con hora, minutos y segundos del momento de la entrada del blog

        $blog->setComentario(htmlentities(addslashes($_POST["area_comentarios"]), ENT_QUOTES)); //pasa al setter el valor introducido por el usuario en el campo comentario y envita inyeccion SQL

        $blog->setImagen($_FILES["imagen"]["name"]); //pasa al setter el nombre de la imagen subida por el usuario

        $manejo_objetos->insertaContenido($blog); //llama al metodo insertaContenido() para inserte en la BBDD la nueva entrada de blog

        echo "<br> Entrada de blog creada! <br>";


    
    }catch(Exception $e){
        die("Error: " . $e->getMessage() );
    }

    ?>

</body>
</html>