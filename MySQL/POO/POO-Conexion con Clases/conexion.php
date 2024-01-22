<?php
    require "config.php";

    class Conexion {
        protected $conexion_db;


        public function __construct(){
            $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO,DB_CONTRA, DB_NOMBRE);
            // Cuando encuentre un fallo de conexion
            if($this->conexion_db->connect_errno){
                echo "Fallo al conectar a Mysql: " . $this->conexion_db->connect_error; //codigo de error

                return;
            }
            // permite utilizar caracteres latinos
            $this->conexion_db->set_charset(DB_CHARSET);
        }
    }

?>