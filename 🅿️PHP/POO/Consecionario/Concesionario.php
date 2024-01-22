<?php

	class Compra_vehiculo{
		
		private int $precio_base;
		// todos los campos que tengan este valor cambiarian si este atributo cambia
		private static int $ayuda=0;
		
				
		public function __construct($gama){
			
			if($gama=="urbano"){
					$this->precio_base=10000;
				
			}else if($gama=="compacto"){
				$this->precio_base=20000;	
				
			}
			
			else if($gama=="berlina"){
				$this->precio_base=30000;	
				
			}		
			
			
		}// fin constructor

		static function descuento_gobierno(){
			// solo se aplicaria si la fecha actual es mayor al 11 de nov. del 2023
			if(date ("m-d-y")>"11-01-23"){

				self::$ayuda = 4500;
			}
		}
		
		function climatizador(){		
			$this->precio_base+=2000;					
			
			
		}// fin climatizador
		
		function navegador_gps(){
			$this->precio_base+=2500;	
			
		}//fin navegador gps
		
		function tapiceria_cuero($color){
			
			if($color=="blanco"){
				$this->precio_base+=3000;
			}
			else if($color=="beige"){
				$this->precio_base+=3500;
				
			}
			else{
				// cualquier otro color
				$this->precio_base+=5000;
				
			}
			
		}// fin tapicería
		
		public function precio_final(){

			$valor_final = $this->precio_base - self::$ayuda; //self:: hace referencia a campos estaticos
			return $valor_final;	
		}// fin precio final
		
		
		
	}// fin clase


?>