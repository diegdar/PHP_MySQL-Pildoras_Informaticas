<?php
if($_POST["nombre"] == "" || $_POST["apellido"] == "" || $_POST["email"] == "" || $_POST["comentarios"] == ""){
    echo "Nos has llenado todos los campos requeridos (*)";
    // Con la funcion die() el programa no continuara leyendo el resto de codigo dado que no se han llenado todos los campos requeridos
    die();
}
    $texto_mail = $_POST["comentarios"];
    $destinario = $_POST["email"];
    $asunto = $_POST["asunto"];

    // serie de convenciones o especificaciones dirigidas al intercambio a través de Internet de todo tipo de archivos 
    $headers = "MIME-Version: 1.0\r\n";
    // Codificación de caracteres
    $headers .= "Content-type: text/html; charset=utf8\r\n";
    // Especificación de quien viene el mensaje
    $headers .= "From: Prueba Diego < diegdarch@hotmail.com>\r\n";

    // Guardamos los valores que booleanos que nos proporciona la funcion 'mail()' en el que si todo fue exitoso nos devolveria true.
    $esExitoso = mail($destinario, $asunto, $texto_mail, $headers);

    if($esExitoso){
        echo "Mensaje enviado con exito";
    }else{
        echo "Ha habido un error al enviar el mensaje";
    }

?>