<?php
    class Conectar{

        public static function conexion(){

            try{
                
               $conexion = new PDO('mysql:host=localhost; dbname=prueba', 'root', '');

                // codigo utf9
                $conexion->exec("SET CHARACTER SET UTF8");

                // Si hay un error crea un objeto de este para poder utilizar sus metodos en la parte del 'catch'
                $conexion->setAttribute  (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exception $e){

                die("Error" . $e->getMessage());
                echo "Línea del error" . $e->getLine();
            }
            return $conexion;
        }

    }

