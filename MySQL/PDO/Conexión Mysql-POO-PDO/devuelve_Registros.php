<?php
    require "Conexion.php";

    class DevuelveRegistros extends Conexion{

        public function __construct(){
            // llama el constructor de la clase padre(conexion) para conectar con la BBDD
            parent :: __construct();
        }
// -------------con PDO --------------------------------------
    public function get_registros($dato){

        $sql = "SELECT * FROM registro_banco WHERE CONCEPTO='" . $dato . " ' ";

        // prepara la consulta
        $sentencia = $this-> conexion_db->prepare($sql);

        // ejecuta la consulta
        $sentencia->execute(array());

        // Crea un array asociativo
        $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
        // cierra la tabla virtual de la consulta para liberar recursos
        $sentencia->closeCursor();

        // cerramos y vaciamos la memoria
        $this->conexion_db=null;
        
        return $resultado;
        
    }
//---------- con Mysql --------------------------------------
        // // crea la consulta SQL y el array de los registros obtenidos
        // public function get_registros($dato){
        //     // consulta SQL
        //     $resultado = $this->conexion_db->query('SELECT * FROM registro_banco WHERE CONCEPTO = "' . $dato . '" ');

        //     // Crea el array con los registros
        //     $registros = $resultado->fetch_all(MYSQLI_ASSOC);

        //     return $registros;
        // }
    }



?>