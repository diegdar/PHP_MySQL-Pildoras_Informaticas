<?php
    class Conectar{

        public static function conexion(){

            require("Model/config.php");

            try{
                $conexion = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOMBRE . ';charset=' . DB_CHARSET, DB_USUARIO);

                // Si hay un error crea un objeto de este para poder utilizar sus metodos en la parte del 'catch'
                $conexion->setAttribute  (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exception $e){

                die("Error" . $e->getMessage());
                echo "Línea del error" . $e->getLine();
            }
            return $conexion;
        }

    }


?>