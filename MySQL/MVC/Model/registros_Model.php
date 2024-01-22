<?php
    class Registros_Model{
        private $db;
        private $registros;

        public function __construct(){

        // conexion a la BBDD
            require_once("Model/conectar.php");

            $this->db = conectar::conexion();
            // Crea un array para poder guardar todos los registros
            $this->registros=array();

        }

        public function get_registros(){
            // Consulta SQL
            $consulta=$this->db->query("SELECT * FROM registro_banco");

            // Recorre la consulta con los registros recibidos
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                // guarda los registros en el array $registros en cada iteración
                $this->registros[]=$filas;
            }
            // Devuelve el array con todos los registros
            return $this->registros;
        }
    }

?>