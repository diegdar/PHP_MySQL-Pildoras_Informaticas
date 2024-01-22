<?php
    require_once("Model/personas_Model.php");

    $persona = new Personas_Model();

    $matrizPersonas = $persona->get_personas();

    require_once("View/personas_View.php");

