<?php

include_once("Objeto_Blog.php");

    class Manejo_Objetos{

        private $conexion;

        // CONSTRUCTOR
        public function __construct($conecta){
            $this->setConexion($conecta);
        }

        // SETTER Y GETTER
        public function setConexion(PDO $conecta){
            $this->conexion = $conecta;
        }

        public function getContenidoPorFecha(){
            $matriz = array();
            $contador = 0; //dara a cada entrada del blog una posición dentro del array

            // Consulta SQL que se guardara en el parametro conexion y a su vez dentro de la variable $resultado
            $resultado = $this->conexion->query("SELECT * FROM CONTENIDO ORDER BY FECHA");

            // Se crea un array($registro) asociativo con el recordset de la consulta SQL 
            while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
                $blog = new Objeto_Blog(); //Crea un objeto Blog en cada registro

            // Pasa los registros del recordset al objeto blog a través de sus setters
                $blog->setId($registro["Id"]);
                $blog->setTitulo($registro["Titulo"]);
                $blog->setFecha($registro["Fecha"]);
                $blog->setComentario($registro["Comentario"]);
                $blog->setImagen($registro["Imagen"]);

                // Se guarda en el array $matriz el objeto en la posicion actual de $contador
                $matriz[$contador] = $blog;

                $contador++; //incrementa una unidad para la proxima entrada del blog
            }

            return $matriz;
        }

        public function insertaContenido(Objeto_Blog $blog){
            // Instruccion SQL para insertar el contenido en la BBDD
            $sql = "INSERT INTO CONTENIDO (Titulo, Fecha, Comentario, Imagen) VALUES ('" . $blog->getTitulo() . "','" . $blog->getFecha() . "', '" . $blog->getComentario(). "', '" . $blog->getImagen() . "')";

            // Ejecucion de la instruccion SQL
            $this->conexion->exec($sql);
        }
    }


?>