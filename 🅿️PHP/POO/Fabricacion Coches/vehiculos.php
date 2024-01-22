<?php
    class Coche{
        protected int $ruedas;
        protected string $color;
        protected int $motor;

        public function __construct (){ //metodo constructor
            $this->ruedas = 4;
            $this->color = "";
            $this->motor = 1600;
        }

        public function getRuedas(){
            return $this->ruedas;
        }

        public function getMotor(){
            return $this->motor;
        }

        function arrancar(){
            echo "Estoy arrancando <br>";

        }

        function girar(){
            echo "Estoy girando <br>";

        }

        function frenar(){
            echo "Estoy frenando <br>";

        }

        function set_color($color_coche, $nombre_coche){
            $this->color = $color_coche;

            echo "<br>El color del " . $nombre_coche . " es: " . $this->color;
        }


    }

    //---------------------------------------------------

    class Camion extends Coche{

        public function __construct (){ //metodo constructor
            $this->ruedas = 8;
            $this->color = "gris";
            $this->motor = 2600;
        }

        function girar(){
            echo "Estoy girando <br>";

        }

        function frenar(){
            echo "Estoy frenando <br>";

        }

        function estableceColor($color_camion, $nombre_camion){
            $this->color = $color_camion;

            echo "<br>El color del " . $nombre_camion . " es: " . $this->color;
        }

        function arrancar(){
            parent:: arrancar(); //metodo de la clase padre
            
            echo "Camion arrancado"; //codigo extra en la clase hija
        }

    }

    ?>