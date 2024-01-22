<?php
// ------------------PAGINACION------------------------------
require_once("conectar.php");


$base = conectar::conexion(); //Crea una instancia de la clase para utilizar el metodo conexion()

$numRegistrosPagina = 3;

// Solo ejecutará este codigo si '$_GET["paginaActual"]' ha sido inicializada (osea si el usuario le ha dado click a uno de los links de pagina)
if(isset($_GET["paginaActual"])){

    if($_GET["paginaActual"]==1){

        header("Location:index.php");
    }else{
        $paginaActual=$_GET["paginaActual"];
    }
}else{ // En caso contrario la paginaActual sera la 1ra

    $paginaActual= 1;
}

$empezarDesde = ($paginaActual - 1) * $numRegistrosPagina;

// Consulta SQL solo para saber el numero de registros totales
$sql_total = "SELECT * FROM DATOS_USUARIOS";

// Preparacion consulta
$resultado = $base->prepare($sql_total);

// Ejecucion consulta
$resultado->execute(); 

// Obtiene el numero de registros que tiene la consulta
$numFilas = $resultado->rowCount();
// Obtiene el numero total de paginas
$totalPaginas = ceil($numFilas / $numRegistrosPagina);

// ----------- ----------------------------
