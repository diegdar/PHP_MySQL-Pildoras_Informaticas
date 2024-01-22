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
    .comentario{
        width: 400px;
        margin: auto;
    }
    .imagen{
        width: 200px;
        height: 200px;
    }
</style>
<body>
    
<?php
    // Importamos la clase Manejo_Objetos para poder instanciar y utilizar sus metodos
    include_once("../Model/Manejo_Objetos.php");

    try{
        $miConexion = new PDO('mysql:host=localhost; dbname=bbddBlog', 'root', '');

        $miConexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $manejo_objetos = new Manejo_Objetos($miConexion);

        // guarda un array con todas las entradas del blog
        $tabla_blog = $manejo_objetos->getContenidoPorFecha();

        if(empty($tabla_blog)){
            echo "No hay entradas de blog aun!";
        }else{

            foreach($tabla_blog as $valor){
                echo "<div class='contenedor'>";
                echo "<h3>" . $valor->getTitulo() . "</h3>";
                echo "<h4>" . $valor->getFecha() . "</h4>";
                echo "<section class='comentario'>" . $valor->getComentario() . "</section>";

                //Cuando exista una imagen nos la mostrará y si no la hay no mostrará imagen rota
                if($valor->getImagen() !=""){ 

                    echo "<img src='../img/" . $valor->getImagen() . "' class='imagen' >";
                }
                echo "</div> <br><hr>";
            }
        }

    }catch(Exception $e){

        die("Error: " . $e->getMessage() );

    }
?>

<br>
<a href="Formulario.php">Insertar otra entrada de blog</a>

</body>
</html>