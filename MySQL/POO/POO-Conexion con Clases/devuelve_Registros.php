<?php
    require "Conexion.php";

    class DevuelveRegistros extends Conexion{

        public function __construct(){
            // llama el constructor de la clase padre(conexion) para conectar con la BBDD
            parent :: __construct();
        }

        
        // crea la consulta SQL y el array de los registros obtenidos
        public function get_registros(){
            // consulta SQL
            $resultado = $this->conexion_db->query('SELECT * FROM registro_banco');

            // Crea el array con los registros
            $registros = $resultado->fetch_all(MYSQLI_ASSOC);

            return $registros;
        }
    }



?>