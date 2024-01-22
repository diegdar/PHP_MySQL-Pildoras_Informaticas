<?php
    require_once("Model/registros_Model.php");

    $registro = new registros_Model();

    $matrizRegistros = $registro->get_registros();

    require_once("View/registros_View.php");

?>