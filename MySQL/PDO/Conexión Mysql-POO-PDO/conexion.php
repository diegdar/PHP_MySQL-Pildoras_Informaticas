<?php
    require "config.php";

    class Conexion {
        protected $conexion_db;

//----------- con PDO ----------------------------------------
    public function __construct(){
        // Creacion de la conexion
        try{

            $this->conexion_db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOMBRE . ';charset=' . DB_CHARSET, DB_USUARIO, DB_CONTRA);
            // Si hay un error crea un objeto de este para poder utilizar sus metodos en la parte del 'catch'
            $this->conexion_db->setAttribute  (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conexion_db;

        }catch(Exception $e){
            echo "ERROR: La línea de error es: " . $e->getLine();
        }

    }

//----------con MySqli------------------------------------------
        // public function __construct(){
        //     $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO,DB_CONTRA, DB_NOMBRE);
        //     // Cuando encuentre un fallo de conexion
        //     if($this->conexion_db->connect_errno){
        //         echo "Fallo al conectar a Mysql: " . $this->conexion_db->connect_error; //codigo de error

        //         return;
        //     }
        //     // permite utilizar caracteres latinos
        //     $this->conexion_db->set_charset(DB_CHARSET);
        // }
}

?>