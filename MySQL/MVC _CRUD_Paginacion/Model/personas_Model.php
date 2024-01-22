<?php
    class Personas_Model{
        private $db;
        private $personas;

        // Cada vez que se instancia un objeto de esta clase se conecta con la BBDD y crea un array vacio en la variable $personas.
        public function __construct(){

        // conexion a la BBDD
            require_once("conectar.php");

            $this->db = conectar::conexion();
            // Crea un array para poder guardar todas los personas
            $this->personas=array();

        }

        // Este metodo crea la consulta que mostrará todos los registros de la BBDD y los guarda en el array de la variable $personas
        public function get_personas(){

            require("paginacion.php");

            // Consulta SQL
            $consulta=$this->db->query("SELECT * FROM datos_usuarios LIMIT $empezarDesde, $numRegistrosPagina");

            // Recorre la consulta con los personas recibidos
            while($filas = $consulta->fetch(PDO::FETCH_ASSOC)){
                // guarda los personas en el array $personas en cada iteración
                $this->personas[]=$filas;
            }
            // Devuelve el array con todos los personas
            return $this->personas;
        }
    }
