<style>
	h1{
		text-align:center;
	}

	table{
		background-color:#FFC;
		padding:5px;
		border:#666 5px solid;
	}
	
	.no_validado{
		font-size:18px;
		color:#F00;
		font-weight:bold;
	}
	
	.validado{
		font-size:18px;
		color:#0C3;
		font-weight:bold;
	}

</style>

<?php
  // si el usuario ha pulsado el boton enviar se ejecutara el codigo dentro del if
  if(isset ($_POST["enviando"])){
    // se guardara en forma de array los datos dentro del id 'nombre_usuario', el $_post es una variable super global
    $nombre = $_POST["nombre_usuario"];
    // se guardara en forma de array los datos dentro del id 'edad_usuario'
    $contra = $_POST["contra"];

//     if($edad <= 18){
// 		echo "Eres menor de edad";
// 	}else if($edad <= 40){
// 		echo "Eres joven";
// 	}else if($edad<= 65){
// 		echo "Eres maduro";
// 	}else{
// 		echo "Cuidate";
// 	}
//   }
switch(true){
	case $nombre == "juan" && $contra == "1234";
		echo "puedes entrar";
		break;
	case $nombre == "maria" && $contra == "1111";
		echo "puedes entrar";
		break;
	case $nombre == "pablo" && $contra == "2222";
		echo "puedes entrar";
		break;
	case $nombre == "arturo" && $contra == "3333";
		echo "puedes entrar";
		break;
	default:
		echo "Usuario no autorizado";
}


  }
?>
